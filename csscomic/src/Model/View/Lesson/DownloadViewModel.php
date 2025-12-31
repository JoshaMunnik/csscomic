<?php

namespace App\Model\View\Lesson;

use App\Lib\Model\View\ViewModelBase;
use App\Model\Constant\Lesson;
use Cake\Validation\Validator;

class DownloadViewModel extends ViewModelBase
{
  #region field names

  public const INDEX = 'index';
  public const TEXT = 'text';

  #endregion

  #region fields

  public string $index = '';

  public string $text = '';

  #endregion

  #region protected methods

  /**
   * @inheritDoc
   */
  protected function buildValidator(): Validator
  {
    return parent::buildValidator()
      ->notEmptyString(self::INDEX, __('The index can not be empty.'))
      ->inList(self::INDEX, Lesson::getIndexValues(), __('The index is an unknown value.'))
      ->notEmptyString(self::TEXT, __('The text can not be empty.'));
  }

  #endregion
}
