<?php

namespace App\Lib\Trait;

use App\Lib\Controller\ApplicationControllerBase;
use App\Model\Tables;
use App\Model\View\Account\ChangePasswordViewModel;
use App\Model\View\Account\EditProfileViewModel;
use App\Model\View\Account\EmailViewModel;
use App\Service\EmailService;
use Random\RandomException;

/**
 * Add this trait to controllers that need to process account related actions.
 *
 * @mixin ApplicationControllerBase
 */
trait AccountActionsTrait
{
  /**
   * Processes the edit profile action.
   *
   * @param array $url Url to redirect to when the profile is updated successfully.
   *
   * @return EditProfileViewModel
   */
  protected function processEditProfile(array $url): EditProfileViewModel
  {
    $viewData = new EditProfileViewModel();
    $user = $this->user();
    if (
      $this->isSubmit() &&
      ($this->getRequest()->getData(self::SUBMIT_EDIT_PROFILE) != null) &&
      $viewData->patch($this->getRequest()->getData())
    ) {
      $user = $this->user();
      $viewData->copyToEntity($user);
      if (Tables::users()->save($user)) {
        $this->updateUser($user);
        $this->redirectWithSuccess(
          $url,
          __('Your profile has been updated.')
        );
        $viewData->clear();
      }
      else {
        $this->error(__('Your profile could not be saved.'));
      }
    }
    else {
      $viewData->copyFromEntity($user);
    }
    return $viewData;
  }

  /**
   * Processes the change password action.
   *
   * @param array $url Url to redirect to when the password is updated successfully.
   *
   * @return ChangePasswordViewModel
   */
  protected function processChangePassword(array $url): ChangePasswordViewModel
  {
    $viewData = new ChangePasswordViewModel();
    if (
      $this->isSubmit() &&
      ($this->getRequest()->getData(self::SUBMIT_CHANGE_PASSWORD) != null) &&
      $viewData->patch($this->getRequest()->getData())
    ) {
      $user = $this->user();
      if ($user->isCorrectPassword($viewData->current_password)) {
        $user->password = $viewData->new_password;
        if (tables::users()->save($user)) {
          $this->redirectWithSuccess(
            $url,
            __('Your password has been updated.'));
        }
        else {
          $this->error(__('An error occurred with the database, your password has not changed.'));
        }
      }
      else {
        $this->error(__('The current password is invalid.'));
      }
    }
    $viewData->clear();
    return $viewData;
  }

  /**
   * Processes the request delete account action.
   *
   * @param array $url Url to redirect to when the form has been processed.
   *
   * @throws RandomException
   */
  protected function processRequestDeleteAccount(array $url): void
  {
    if (
      $this->isSubmit() &&
      ($this->getRequest()->getData(self::SUBMIT_REQUEST_DELETE_ACCOUNT) != null)
    ) {
      $user = $this->user();
      if ($user) {
        $user->generateAccountDeleteToken();
        if (tables::users()->save($user)) {
          EmailService::sendAccountDeleteToken($user, $user->account_delete_token);
        }
        else {
          $this->redirectWithError(
            $url,
            __('An error occurred with the database, your delete token has not been created.')
          );
        }
      }
      $this->redirectWithSuccess(
        $url,
        __('An email has been sent to you with instructions how to delete your account.')
      );
    }
  }
}
