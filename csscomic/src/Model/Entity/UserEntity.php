<?php

namespace App\Model\Entity;

use App\Lib\Model\Entity\IEntityWithId;
use App\Lib\Model\Entity\IEntityWithTimestamp;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;
use DateTime;
use Random\RandomException;

/**
 * {@link UserEntity} encapsulates a user in the database.
 * *
 * @property string $email
 * @property string $name
 * @property string $password
 * @property DateTime $password_date
 * @property bool $administrator
 * @property string|null $password_reset_token
 * @property DateTime|null $password_reset_date
 * @property DateTime $last_visit_date
 * @property string $language_code
 * @property string|null $account_delete_token
 * @property DateTime|null $account_delete_date
 */
class UserEntity extends Entity implements IEntityWithId, IEntityWithTimestamp
{
  #region field constants

  public const EMAIL = 'email';
  public const NAME = 'name';
  public const PASSWORD = 'password';
  public const PASSWORD_DATE = 'password_date';
  public const ADMINISTRATOR = 'administrator';
  public const PASSWORD_RESET_TOKEN = 'password_reset_token';
  public const PASSWORD_RESET_DATE = 'password_reset_date';
  public const LAST_VISIT_DATE = 'last_visit_date';
  public const LANGUAGE_CODE = 'language_code';
  public const ACCOUNT_DELETE_TOKEN = 'account_delete_token';
  public const ACCOUNT_DELETE_DATE = 'account_delete_date';

  #endregion

  #region public methods

  /**
   * Checks if the password matches the stored password.
   *
   * @param string $password Password to check
   *
   * @return bool True if the password matches
   */
  public function isCorrectPassword(string $password): bool
  {
    return (new DefaultPasswordHasher())->check($password, $this->password);
  }

  /**
   * Assigns a new password and also update {@link $password_date}, {@link $password_reset_date},
   * and {@link $password_reset_token}.
   *
   * @param $password
   *
   * @return void
   */
  public function assignNewPassword($password): void
  {
    $this->password_date = new DateTime();
    $this->password = (new DefaultPasswordHasher())->hash($password);
    $this->password_reset_date = null;
    $this->password_reset_token = null;
  }

  /**
   * Generates a new password reset token and sets the {@link $password_reset_date}.
   *
   * @return void
   *
   * @throws RandomException
   */
  public function generatePasswordResetToken(): void
  {
    $this->password_reset_token = bin2hex(random_bytes(16));
    $this->password_reset_date = new DateTime();
  }

  /**
   * Generates a new account delete token and sets the {@link $account_delete_date}.
   *
   * @return void
   *
   * @throws RandomException
   */
  public function generateAccountDeleteToken(): void
  {
    $this->account_delete_token = bin2hex(random_bytes(16));
    $this->account_delete_date = new DateTime();
  }

  #endregion

  #region protected methods

  /**
   * Stores a hashed version of the password, if it is not empty.
   */
  protected function _setPassword(string $password): string
  {
    if (strlen($password) > 0) {
      $this->password_date = new DateTime();
      return (new DefaultPasswordHasher())->hash($password);
    }
    return '';
  }

  /**
   * Stores the email in lowercase.
   */
  protected function _setEmail(string $email): string
  {
    return strtolower($email);
  }

  #endregion
}
