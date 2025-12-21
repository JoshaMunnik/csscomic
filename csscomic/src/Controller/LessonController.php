<?php

namespace App\Controller;

use App\Lib\Controller\ApplicationControllerBase;
use App\Model\Constant\Lesson;
use App\Model\Tables;
use Cake\Event\EventInterface;
use Cake\Http\Response;

/**
 * {@link LessonController} handles the lesson pages of the web application.
 */
class LessonController extends ApplicationControllerBase
{
  #region public constants

  public const VIEW = [self::class, 'view'];
  public const SAVE = [self::class, 'save'];

  #endregion

  #region cakephp methods

  public function beforeFilter(EventInterface $event): void
  {
    parent::beforeFilter($event);
    $this->FormProtection->setConfig('unlockedActions', [self::SAVE[1]]);
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

  #endregion
}
