<?php

namespace App\Controller;

use App\Lib\Controller\ApplicationControllerBase;
use App\Lib\Trait\AccountActionsTrait;
use Cake\Http\Response;
use Random\RandomException;

/**
 * {@link HomeController} handles the start page of the web application.
 */
class HomeController extends ApplicationControllerBase
{
  #region traits

  use AccountActionsTrait;

  #endregion

  #region public constants

  public const INDEX = [self::class, 'index'];
  public const PRIVACY = [self::class, 'privacy'];
  public const TERMS = [self::class, 'terms'];

  #endregion

  #region public methods

  /**
   * @throws RandomException
   */
  public function index(): ?Response
  {
    if ($this->user()) {
      $this->set('editProfileData', $this->processEditProfile(self::INDEX));
      $this->set('changePasswordData', $this->processChangePassword(self::INDEX));
      $this->processRequestDeleteAccount(self::INDEX);
    }
    return null;
  }

  public function privacy(): ?Response
  {
    return null;
  }

  public function terms(): ?Response
  {
    return null;
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
      self::PRIVACY[1],
      self::TERMS[1],
    ];
  }

  #endregion
}
