<?php

namespace App\Service;

use App\Model\Entity\UserEntity;
use App\Tool\LanguageTool;
use App\View\ApplicationView;
use Cake\Mailer\Mailer;

/**
 * {@link EmailService} is a service to send the various emails.
 */
class EmailService
{
  #region public methods

  /**
   * Sends an email with the reset token to the user.
   *
   * @param UserEntity $user
   * @param string $token
   *
   * @return void
   */
  public static function sendPasswordResetToken(UserEntity $user, string $token): void
  {
    LanguageTool::runForLanguage(
      $user->language_code,
      function () use ($user, $token) {
        self::getMailer('reset_password')
          ->setTo($user->email, $user->name)
          ->setSubject(__('Reset Password for css comic site'))
          ->setViewVars([
            'user' => $user,
            'token' => $token,
          ])
          ->deliver();
      }
    );
  }

  /**
   * Sends an email with the reset token to the user.
   *
   * @param UserEntity $user
   * @param string $token
   *
   * @return void
   */
  public static function sendAccountDeleteToken(UserEntity $user, string $token): void
  {
    LanguageTool::runForLanguage(
      $user->language_code,
      function () use ($user, $token) {
        self::getMailer('delete_account')
          ->setTo($user->email, $user->name)
          ->setSubject(__('Delete account at css comic site'))
          ->setViewVars([
            'user' => $user,
            'token' => $token,
          ])
          ->deliver();
      }
    );
  }

  /**
   * Sends a welcome email to a newly registered user.
   *
   * @param UserEntity $user
   *
   * @return void
   */
  public static function sendRegistration(UserEntity $user): void
  {
    LanguageTool::runForLanguage(
      $user->language_code,
      function () use ($user) {
        self::getMailer('registration')
          ->setTo($user->email, $user->name)
          ->setSubject(__('Welcome at the css comic site'))
          ->setViewVars([
            'user' => $user,
          ])
          ->deliver();
      }
    );
  }

  #endregion

  #region private methods

  /**
   * Gets a mailer configured for a certain template only using HTML.
   *
   * @param string $template
   *
   * @return Mailer
   */
  private static function getMailer(string $template): Mailer
  {
    $result = new Mailer('default');
    $result
      ->setEmailFormat('html')
      ->viewBuilder()
      ->setClassName(ApplicationView::class)
      ->setTemplate($template);
    return $result;
  }

  #endregion
}
