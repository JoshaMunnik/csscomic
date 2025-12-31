<?php

namespace App\Controller;

use App\Lib\Controller\ApplicationControllerBase;
use App\Model\Constant\Lesson;
use App\Model\Tables;
use App\Model\View\Lesson\DownloadViewModel;
use App\Tool\HtmlTool;
use Cake\Event\EventInterface;
use Cake\Http\Response;
use DOMException;

/**
 * {@link LessonController} handles the lesson pages of the web application.
 */
class LessonController extends ApplicationControllerBase
{
  #region public constants

  public const INDEX = [self::class, 'index'];
  public const VIEW = [self::class, 'view'];
  public const SAVE = [self::class, 'save'];
  public const DOWNLOAD = [self::class, 'download'];

  #endregion

  #region cakephp methods

  public function beforeFilter(EventInterface $event): void
  {
    parent::beforeFilter($event);
    $this->FormProtection->setConfig('unlockedActions', [self::SAVE[1], self::DOWNLOAD[1]]);
  }

  #endregion

  #region public methods

  /**
   * Redirects to the lesson view.
   *
   * @return Response|null
   */
  public function index(): ?Response
  {
    return $this->redirect(self::VIEW);
  }

  /**
   * Views a certain lesson.
   *
   * @param string|null $index
   * @return Response|null
   */
  public function view(string $index = null): ?Response
  {
    $index = Lesson::getIndex($index);
    $this->set('index', $index);
    $user = $this->user();
    $this->set('code', $user ? Tables::lessons()->getText($user, $index) : '');
    return null;
  }

  /**
   * Saves lesson user code/text. This is an ajax call, expected POST JSON:
   *
   * {
   *   "index": "...",
   *   "text": "..."
   * }
   *
   * @return Response Either empty 200 on success or 50x on error
   */
  public function save(): Response
  {
    $user = $this->user();
    if ($user === null) {
      return $this->getResponse()->withStatus(401);
    }
    $this->disableAutoRender();
    $this->getRequest()->allowMethod(['post']);
    $data = $this->getRequest()->getData();
    $index = $data['index'] ?? null;
    if (!Lesson::isValidIndex($index)) {
      return $this->getResponse()->withStatus(501);
    }
    $text = $data['text'] ?? '';
    if (Tables::lessons()->saveText($user, $index, $text)) {
      return $this->getResponse()->withStatus(200);
    }
    return $this->getResponse()->withStatus(503);
  }

  /**
   * Downloads a lesson output as PDF. The method expects the following POST parameters:
   * - index: The lesson index
   * - text: The lesson text/code
   *
   * @return Response The file download response
   *
   * @throws DOMException
   */
  public function download(): Response
  {
    $formData = new DownloadViewModel();
    if (!$this->isSubmit()) {
      return $this->redirectWithError(self::INDEX, __('Invalid request method.'));
    }
    if (!$formData->patch($this->getRequest()->getData())) {
      return $this->redirectWithError(self::INDEX, __('Missing and/or invalid form fields.'));
    }
    $content = $this->generateHtml($formData->index, $formData->text);
    $fileName = 'lesson_' . $formData->index . '.html';
    return $this
      ->getResponse()
      // do not use text/html to prevent debugKit from injecting content
      ->withType('application/octet-stream')
      ->withStringBody($content)
      ->withDownload($fileName);
  }

  #endregion

  #region protected methods

  /**
   * @inheritDoc
   */
  protected function getAnonymousActions(): array
  {
    return [
      self::INDEX[1],
      self::VIEW[1],
      self::SAVE[1],
      self::DOWNLOAD[1],
    ];
  }

  #endregion

  #region private methods

  /**
   * @throws DOMException
   */
  private function generateHtml(string $index, string $text): string
  {
    return HtmlTool::inlineStylesheetLinks($text);
  }

  #endregion
}
