<?php

namespace App\Lib\Controller;

use App\Model\Entity\UserEntity;
use Authentication\Controller\Component\AuthenticationComponent;
use Cake\Event\EventInterface;
use Exception;

/**
 * {@link AuthenticatedControllerBase} adds a check for every action if the user is logged in.
 *
 * If not, the user gets redirected to the login page.
 *
 * @property AuthenticationComponent $Authentication
 */
class AuthenticatedControllerBase extends ApplicationControllerBase
{
  #region cakephp callbacks

  /**
   * @inheritdoc
   *
   * @throws Exception
   */
  public function beforeFilter(EventInterface $event): void
  {
    parent::beforeFilter($event);
    $this->loadComponent('Authentication.Authentication');
    $this->Authentication->allowUnauthenticated($this->getAnonymousActions());
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
   * Also sets the updated user at the authentication component.
   *
   * @param UserEntity $updatedUser
   */
  protected function updateUser(UserEntity $updatedUser): void
  {
    parent::updateUser($updatedUser);
    $this->Authentication->setIdentity($this->user());
  }

  #endregion
}
