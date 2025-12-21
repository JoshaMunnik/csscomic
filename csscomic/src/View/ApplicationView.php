<?php
declare(strict_types=1);

namespace App\View;

use App\Lib\Model\Entity\IEntityWithId;
use App\Lib\Model\View\ViewModelBase;
use App\Model\Constant\Language;
use App\Model\Entity\UserEntity;
use App\Tool\UrlTool;
use App\View\Helper\StylingHelper;
use Authentication\View\Helper\IdentityHelper;
use Cake\Core\Configure;
use Cake\View\Helper\UrlHelper;
use Cake\View\View;

/**
 * Application View
 *
 * Your applications default view class
 *
 * @link https://book.cakephp.org/5/en/views.html#the-app-view
 *
 * @property StylingHelper $Styling
 * @property UrlHelper $Url
 * @property IdentityHelper $Identity
 */
class ApplicationView extends View
{
  #region private variables

  /**
   * Used to generate unique DOM ids with.
   *
   * @var int
   */
  private static int $s_domId = 0;

  #endregion

  #region public methods

  /**
   * Initialization hook method.
   *
   * Use this method to add common initialization code like adding helpers.
   *
   * e.g. `$this->addHelper('Html');`
   *
   * @return void
   */
  public function initialize(): void
  {
    $this->loadHelper('Styling');
    $this->loadHelper('Url');
    $this->loadHelper('Authentication.Identity');
  }

  /**
   * Shortcut, that maps to {@link UrlTool::url}
   *
   * @param string|array $url
   *
   * @return array
   */
  public function url(string|array $url): array
  {
    return UrlTool::url($url);
  }

  /**
   * Inserts a link, using {@link url} to generate the URL.
   *
   * @param string $title
   * @param string|array $url
   * @param array $options
   *
   * @return string
   */
  public function link(string $title, string|array $url = [], array $options = []): string
  {
    return $this->Html->link($title, $this->url($url), $options);
  }

  /**
   * Creates a form, forcing only the context as the value source.
   *
   * @param ViewModelBase $model
   * @param string|array $url
   * @return string
   */
  public function createForm(ViewModelBase $model, string|array $url = ''): string
  {
    return $this->Form->create(
      $model,
      [
        'url' => $this->url($url),
        'templates' => 'form_styles',
        'valueSources' => ['context'],
        'idPrefix' => get_class($model),
      ]
    );
  }

  /**
   * Checks if there is an authenticated user and the user is an administrator.
   *
   * @return bool
   */
  public function isAdministrator(): bool
  {
    $user = $this->getRequest()->getAttribute('identity');
    return $user && $user->get(UserEntity::ADMINISTRATOR);
  }

  /**
   * Gets the name of the authenticated user.
   *
   * @return string Name or empty string if no user is authenticated.
   */
  public function userName(): string
  {
    $user = $this->getRequest()->getAttribute('identity');
    return $user?->get(UserEntity::NAME) ?? '';
  }

  /**
   * Checks if the authenticated user is the given user.
   *
   * @param UserEntity $someUser
   *
   * @return bool True if there is an authenticated user and their ids match.
   */
  public function isUser(UserEntity $someUser): bool
  {
    $user = $this->getRequest()->getAttribute('identity');
    return $user?->get(IEntityWithId::ID) === $someUser->id;
  }

  /**
   * Checks if there is an authenticated user.
   *
   * @return bool
   */
  public function isLoggedIn(): bool
  {
    $user = $this->getRequest()->getAttribute('identity');
    return $user !== null;
  }

  /**
   * Gets the current language code from the URL.
   *
   * @return string
   */
  public function language(): string
  {
    return $this->getRequest()->getParam(UrlTool::LANGUAGE) ?? Language::DEFAULT_CODE;
  }

  /**
   * Creates a unique DOM id.
   *
   * @return string
   */
  public function createDomId(): string
  {
    $id = ++self::$s_domId;
    return 'dom-id-'.$id;
  }

  /**
   * Converts the given text to a JavaScript string. The method will trim line breaks at the start
   * and end of the text.
   *
   * @param string $text
   *
   * @return string
   */
  public function javascriptString(string $text): string
  {
    return json_encode(trim($text, "\r\n"), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  }

  /**
   * Returns a string that can be used with the import statement.
   *
   * @return string
   */
  public function javascriptBundle(): string
  {
    return $this->Url->assetTimestamp(
      Configure::read('debug') ? '/js/bundle.js' : '/js/bundle.min.js'
    );
  }

  /**
   * Renders an element in the 'content/{language code}/' folder using the current selected
   * language.
   *
   * @param string $name
   * @param array $data
   * @param array $options
   *
   * @return string
   */
  public function contentElement(string $name, array $data = [], array $options = []): string {
    return $this->element('content/'.$this->language().'/'.$name, $data, $options);
  }

  #endregion
}
