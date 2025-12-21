<?php

namespace App\Model\Table;

use App\Lib\Model\Entity\IEntityWithId;
use App\Lib\Model\Table\TableWithTimestamp;
use App\Model\Entity\LessonEntity;
use App\Model\Entity\UserEntity;
use App\Model\Entity\UserWithLessonsEntity;
use Cake\Validation\Validator;

/**
 * This table encapsulates the users, who can log in to the system to keep store lesson texts.
 */
class UsersTable extends TableWithTimestamp
{
  #region cakephp callbacks

  /**
   * @inheritDoc
   */
  public function initialize(array $config): void
  {
    parent::initialize($config);
    $this->setEntityClass(UserEntity::class);
    $this
      ->hasMany(LessonsTable::getDefaultAlias())
      ->setForeignKey(LessonEntity::USER_ID);
  }

  /**
   * @inheritDoc
   */
  public function validationDefault(Validator $validator): Validator
  {
    $validator
      ->requirePresence([UserEntity::NAME, UserEntity::EMAIL, UserEntity::PASSWORD], 'create')
      ->notEmptyString(UserEntity::NAME)
      ->email(UserEntity::EMAIL);
    return $validator;
  }

  #endregion

  #region public methods

  /**
   * Checks if email is not used.
   *
   * @param string $email
   * @param string|null $id When not null, ignore user with this id.
   *
   * @return bool
   */
  public function isUnusedEmail(string $email, string|null $id = ''): bool
  {
    $email = strtolower($email);
    if (empty($id)) {
      return $this
          ->find()
          ->where([UserEntity::EMAIL => $email])
          ->count() === 0;
    }
    return $this
        ->find()
        ->where([
          UserEntity::EMAIL => $email,
          IEntityWithId::ID.' !=' => $id
        ])
        ->count() === 0;
  }

  /**
   * Checks if a password reset token is known and has not expired.
   *
   * @param string $code
   *
   * @return bool
   */
  public function validatePasswordResetToken(string $code): bool
  {
    return $this->find()
        ->where([
          UserEntity::PASSWORD_RESET_TOKEN => $code,
          UserEntity::PASSWORD_RESET_DATE.' >=' => date('Y-m-d H:i:s',
            strtotime('-1 day'))
        ])
        ->count() === 1;
  }

  /**
   * Checks if an account delete token is known and has not expired.
   *
   * @param string $code
   *
   * @return bool
   */
  public function validateAccountDeleteToken(string $code): bool
  {
    return $this->find()
        ->where([
          UserEntity::ACCOUNT_DELETE_TOKEN => $code,
          UserEntity::ACCOUNT_DELETE_DATE.' >=' => date('Y-m-d H:i:s',
            strtotime('-1 day'))
        ])
        ->count() === 1;
  }

  /**
   * Tries to find a user for a password reset token.
   *
   * @param string $code
   *
   * @return UserEntity|null
   */
  public function findUserForPasswordResetToken(string $code): UserEntity|null
  {
    return $this->find()
      ->where([
        UserEntity::PASSWORD_RESET_TOKEN => $code,
        UserEntity::PASSWORD_RESET_DATE.' >=' => date('Y-m-d H:i:s', strtotime('-1 day'))
      ])
      ->first();
  }

  /**
   * Tries to find a user for an account delete token.
   *
   * @param string $code
   *
   * @return UserEntity|null
   */
  public function findUserForAccountDeleteToken(string $code): UserEntity|null
  {
    return $this->find()
      ->where([
        UserEntity::ACCOUNT_DELETE_TOKEN => $code,
        UserEntity::ACCOUNT_DELETE_DATE.' >=' => date('Y-m-d H:i:s', strtotime('-1 day'))
      ])
      ->first();
  }

  /**
   * Tries to find a user by an email address.
   *
   * @param string $email
   *
   * @return UserEntity|null
   */
  public function findForEmail(string $email): UserEntity|null
  {
    $email = strtolower($email);
    return $this->find()
      ->where([UserEntity::EMAIL => $email])
      ->first();
  }

  /**
   * Tries to find a user by an id.
   *
   * @param string $id
   *
   * @return UserEntity|null
   */
  public function findForId(string $id): UserEntity|null
  {
    return $this->find()
      ->where([IEntityWithId::ID => $id])
      ->first();
  }

  /**
   * Gets a user entity for an id.
   *
   * @param string $id
   *
   * @return UserEntity
   */
  public function getForId(string $id): UserEntity
  {
    /** @var UserEntity $result */
    $result = $this->get($id);
    return $result;
  }

  /**
   * Gets all user entities.
   *
   * @return UserEntity[]
   */
  public function getAll(): array
  {
    return $this->find('all')->all()->toList();
  }

  /**
   * Gets all user entities with related participants.
   *
   * @return UserWithLessonsEntity[]
   */
  public function getAllWithLessons(): array
  {
    return $this
      ->find('all')
      ->contain([
        LessonsTable::getDefaultAlias(),
      ])
      ->all()
      ->toList();
  }

  #endregion
}
