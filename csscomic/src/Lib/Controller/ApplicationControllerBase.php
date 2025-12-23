<?php
declare(strict_types=1);

namespace App\Lib\Controller;

use App\Controller\AccountController;
use App\Controller\AdministratorController;
use App\Controller\HomeController;
use App\Model\Constant\Language;
use App\Model\Entity\UserEntity;
use App\Model\Tables;
use App\Tool\UrlTool;
use App\View\ApplicationView;
use Authentication\Controller\Component\AuthenticationComponent;
use Cake\Controller\Component\FlashComponent;
use Cake\Controller\Component\FormProtectionComponent;
use Cake\Controller\Controller;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\I18n\I18n;
use DateTime;
use Exception;
use Psr\Http\Message\UriInterface;
use ReflectionClass;

/**
 * Bases class for all controllers in the application.
 *
 * Override {@link getAnonymousActions()} to allow unauthenticated access to certain actions.
 *
 * @property AuthenticationComponent $Authentication
 * @property FlashComponent $Flash
 * @property FormProtectionComponent $FormProtection
 */
class ApplicationControllerBase extends Controller
{
  #region public constants

  /**
   * Form submit actions. These are defined here, since a trait cannot be referenced to access a
   * constant.
   */
  const SUBMIT_EDIT_PROFILE = 'submit_edit_profile';
  const SUBMIT_CHANGE_PASSWORD = 'submit_change_password';
  const SUBMIT_REQUEST_DELETE_ACCOUNT = 'submit_request_delete_account';

  #endregion

  #region private variables

  /**
   * Logged in user.
   *
   * @var null|UserEntity
   */
  private ?UserEntity $m_user = null;

  /**
   * Cached controller base names.
   *
   * @var array
   */
  private static array $s_controllerNames = [];

  #endregion

  #region cakephp methods

  /**
   * Initialization hook method.
   *
   * @return void
   *
   * @throws Exception If a component fails to load
   */
  public function initialize(): void
  {
    parent::initialize();
    $this->loadComponent('Flash');
    $this->viewBuilder()->setClassName(ApplicationView::class);
    $user = $this->user();
    $this->processLanguage($user);
    if ($user != null) {
      $user->last_visit_date = new DateTime();
      Tables::users()->save($user);
    }
    $this->loadComponent('Authentication.Authentication');
    $this->Authentication->allowUnauthenticated($this->getAnonymousActions());

    /*
     * Enable the following component for recommended CakePHP form protection settings.
     * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
     */
    $this->loadComponent('FormProtection');
  }

  /**
   * @inheritdoc
   */
  public function redirect(array|string|UriInterface $url, int $status = 302): ?Response
  {
    if (is_array($url)) {
      $url = UrlTool::url($url);
    }
    return parent::redirect($url, $status);
  }

  #endregion

  #region public methods

  /**
   * Gets the name of the controller, that being the class name without the "Controller" suffix.
   *
   * @return string
   */
  public static function controllerName(): string
  {
    $called = static::class;
    return self::$s_controllerNames[$called] ??= preg_replace(
      '/Controller$/', '', (new ReflectionClass($called))->getShortName()
    );
  }

  #endregion

  #region protected methods

  /**
   * Gets the actions that can be performed without the user being authenticated.
   *
   * The default implementation returns an empty array. Subclasses can override this method.
   *
   * @return string[] List of actions
   */
  protected function getAnonymousActions(): array
  {
    return [];
  }

  /**
   * Returns the current logged-in user or null if there is no user logged in.
   *
   * @return UserEntity|null Current user
   */
  protected function user(): ?UserEntity
  {
    if (isset($this->m_user)) {
      return $this->m_user;
    }
    $identity = $this->getRequest()->getAttribute('identity');
    if (isset($identity)) {
      $usersTable = Tables::users();
      $this->m_user = $usersTable->findForId($identity->get('id'));
      return $this->m_user;
    }
    return null;
  }

  /**
   * Updates the stored logged-in user. Only when the id matched the new record gets set.
   *
   * @param UserEntity $updatedUser
   */
  protected function updateUser(UserEntity $updatedUser): void
  {
    $currentUser = $this->user();
    if (isset($currentUser) && ($currentUser->id === $updatedUser->id)) {
      $this->m_user = $updatedUser;
    }
    $this->Authentication->setIdentity($updatedUser);
  }

  /**
   * Calls {@link FlashComponent::error}
   *
   * @param string $message Error message, can contain HTML formatting.
   * @param array $options Additional options
   *
   * @return bool Always false
   */
  protected function error(string $message, array $options = []): bool
  {
    $this->Flash->error($message, $options + ['escape' => false]);
    return false;
  }

  /**
   * Calls {@link FlashComponent::success}
   *
   * @param string $message Success message, can contain HTML formatting.
   * @param array $options Additional options
   *
   * @return bool Always true
   */
  protected function success(string $message, array $options = []): bool
  {
    $this->Flash->success($message, $options + ['escape' => false]);
    return true;
  }

  /**
   * Sets a success message and redirects to a url.
   *
   * @param array|string $url Url or action array to jump to
   * @param string $message Success message, can contain HTML formatting.
   * @param array $options Additional message options
   *
   * @return Response|null
   */
  protected function redirectWithSuccess(
    array|string $url,
    string $message,
    array $options = []
  ): ?Response {
    $this->success($message, $options);
    return $this->redirect($url);
  }

  /**
   * Sets an error message and redirects to a url.
   *
   * @param array|string $url Url or action array to jump to
   * @param string $message Success message, can contain HTML formatting.
   * @param array $options Additional message options
   *
   * @return Response|null
   */
  protected function redirectWithError(
    array|string $url,
    string $message,
    array $options = []
  ): ?Response {
    $this->success($message, $options);
    return $this->redirect($url);
  }

  /**
   * Gets the action to return to the home page.
   *
   * @return array
   */
  protected function getHomeAction(): array
  {
    $user = $this->user();
    if (!$user) {
      $this->error(__('You are not logged in.'));
      return AccountController::LOGIN;
    }
    return $user->administrator ? AdministratorController::INDEX : HomeController::INDEX;
  }

  /**
   * Removes one or more names from the request. This method can be used to remove for example
   * password fields.
   *
   * @param string $aNames Names to remove
   *
   * @return ServerRequest Updated request
   */
  protected function withoutData(...$aNames): ServerRequest
  {
    $request = $this->getRequest();
    foreach ($aNames as $name) {
      $request = $request->withoutData($name);
    }
    return $this->getRequest();
  }

  /**
   * Checks if request is a post or put type.
   *
   * @return bool True if request is post and put.
   */
  protected function isSubmit(): bool
  {
    return $this->getRequest()->is(['post', 'put', 'patch']);
  }

  #endregion

  #region private methods

  /**
   * Determines the language to use.
   *
   * @param UserEntity|null $user When not null, the user's language is updated. The entity still
   * needs to be saved.
   *
   * @return void
   */
  private function processLanguage(?UserEntity $user): void
  {
    $languageCode = $this->getRequest()->getParam(UrlTool::LANGUAGE)
      ?? $user?->language_code
      ?? Language::DEFAULT_CODE;
    I18n::setLocale($languageCode);
    if ($user && ($user->language_code != $languageCode)) {
      $user->language_code = $languageCode;
    }
  }

  #endregion
}

