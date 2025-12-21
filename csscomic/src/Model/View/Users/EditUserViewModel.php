<?php

namespace App\Model\View\Users;

use App\Model\Constant\Language;
use App\Model\Entity\UserEntity;
use App\Model\Tables;
use App\Model\View\IdViewModel;
use Cake\Validation\Validator;

/**
 * {@link EditUserViewModel} is the view model for editing a user.
 */
class EditUserViewModel extends IdViewModel
{
  #region field constants

  const EMAIL = 'email';
  const NAME = 'name';
  const PASSWORD = 'password';
  const ADMINISTRATOR = 'administrator';
  const LANGUAGE_CODE = 'language_code';

  #endregion

  #region public properties

  public string $email = '';
  public string $name = '';
  public string $password = '';
  public bool $administrator = false;
  public string $language_code = Language::DEFAULT_CODE;

  #endregion

  #region public methods

  public function copyFromEntity(UserEntity $entity): void
  {
    $this->id = $entity->id;
    $this->email = $entity->email;
    $this->name = $entity->name;
    $this->administrator = $entity->administrator;
    $this->language_code = $entity->language_code;
    $this->password = '';
    $this->setNew(false);
  }

  public function copyToEntity(UserEntity $entity): void
  {
    $entity->email = $this->email;
    $entity->name = $this->name;
    $entity->administrator = $this->administrator;
    $entity->language_code = $this->language_code;
    if (!empty($this->password)) {
      $entity->password = $this->password;
    }
  }

  /**
   * @inheritDoc
   */
  public function clear(): void
  {
    parent::clear();
    $this->email = '';
    $this->name = '';
    $this->password = '';
    $this->administrator = false;
    $this->language_code = Language::DEFAULT_CODE;
  }

  /**
   * @inheritDoc
   */
  public function getFieldName(string $field): string
  {
    return match ($field) {
      self::EMAIL => __('email'),
      self::NAME => __('name'),
      self::PASSWORD => __('password'),
      self::ADMINISTRATOR => __('administrator'),
      default => parent::getFieldName($field),
    };
  }

  #endregion

  #region protected methods

  /**
   * @inheritDoc
   */
  protected function buildValidator(): Validator
  {
    return parent::buildValidator()
      ->notEmptyString(self::NAME)
      ->notEmptyString(self::EMAIL)
      ->email(self::EMAIL)
      ->add(self::EMAIL, 'unusedEmail', [
        'rule' => fn($value, array $context) => $this->isUnusedEmail($value, $context)
      ]);
  }

  #endregion

  #region private methods

  /**
   * Check if the email is unused.
   *
   * @param string $value
   * @param array $context
   *
   * @return bool|string
   */
  private function isUnusedEmail(string $value, array $context): bool|string
  {
    $email = $context['data'][self::EMAIL];
    $id = $context['data'][self::ID];
    $users = Tables::users();
    if ($users->isUnusedEmail($email, $id)) {
      return true;
    }
    return __('There is already a user for the email address.');
  }

  #endregion
}
