<?php

namespace App\Model\View\Account;

use App\Lib\Model\View\ViewModelBase;

/**
 * A view model to handle the deletion of an account.
 */
class DeleteAccountViewModel extends ViewModelBase
{
  #region property names

  public const DELETE_TOKEN = 'delete_token';

  #endregion

  #region properties

  /**
   * Reset token.
   *
   * @var string
   */
  public string $delete_token = '';

  #endregion

  #region public methods

  /**
   * @inheritDoc
   */
  public function clear(): void {
  }

  #endregion
}
