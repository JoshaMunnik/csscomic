<?php

namespace App\Model\View\Account;

use App\Lib\Model\View\ViewModelBase;
use App\Model\Entity\UserEntity;
use Cake\Validation\Validator;

/**
 * A view model to handle the editing of a user profile.
 */
class EditProfileViewModel extends ViewModelBase
{
  #region property names

  public const NAME = 'name';

  #endregion

  #region properties

  /**
   * Users name
   *
   * @var string
   */
  public string $name = '';

  #endregion

  #region public methods

  /**
   * @inheritDoc
   */
  public function clear(): void {
  }

  /**
   * Copies the data from the entity to the view model.
   *
   * @param UserEntity $user
   *
   * @return void
   */
  public function copyFromEntity(UserEntity $user): void {
    $this->name = $user->name;
  }

  /**
   * Copies the data from the view model to the entity.
   *
   * @param UserEntity $user
   *
   * @return void
   */
  public function copyToEntity(UserEntity $user): void {
    $user->name = $this->name;
  }

  /**
   * @inheritDoc
   */
  public function getFieldName(string $field): string
  {
    return match ($field) {
      self::NAME => __('name'),
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
      ->notEmptyString(self::NAME, __('The name can not be empty.'));
  }

  #endregion
}
