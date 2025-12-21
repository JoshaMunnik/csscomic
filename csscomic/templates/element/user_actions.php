<?php

use App\Controller\AdministratorController;
use App\Model\Constant\HtmlAction;
use App\Model\Enum\ButtonColorEnum;
use App\Model\View\Account\ChangePasswordViewModel;
use App\Model\View\Account\EditProfileViewModel;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var EditProfileViewModel $editProfileData
 * @var ChangePasswordViewModel $changePasswordData
 */

const EDIT_PROFILE = 'edit-profile';
const CHANGE_PASSWORD = 'change-password';
const REQUEST_DELETE_ACCOUNT = 'request-delete-account';

?>
<?= $this->Styling->smallTitle(__('To manage your account, click one of the actions:')) ?>
<?= $this->Styling->beginPageButtons() ?>
<?= $this->Styling->button(
  __('Edit profile'),
  ButtonColorEnum::PRIMARY,
  [
    HtmlAction::SHOW_DIALOG => '#'.EDIT_PROFILE,
  ],
) ?>
<?= $this->Styling->button(
  __('Change password'),
  ButtonColorEnum::PRIMARY,
  [
    HtmlAction::SHOW_DIALOG => '#'.CHANGE_PASSWORD,
  ],
) ?>
<?= $this->Styling->button(
  __('Delete account'),
  ButtonColorEnum::DANGER,
  [
    HtmlAction::SHOW_DIALOG => '#'.REQUEST_DELETE_ACCOUNT,
  ],
) ?>
<?php if ($this->isAdministrator()) : ?>
  <?= $this->Styling->linkButton(
    __('Administration'), AdministratorController::INDEX, ButtonColorEnum::SECONDARY
  ) ?>
<?php endif; ?>
<?= $this->Styling->endPageButtons() ?>
<?= $this->element(
  'dialog/edit_profile',
  [
    'id' => EDIT_PROFILE,
    'data' => $editProfileData,
  ]
) ?>
<?= $this->element(
  'dialog/change_password',
  [
    'id' => CHANGE_PASSWORD,
    'data' => $changePasswordData,
  ]
) ?>
<?= $this->element(
  'dialog/request_delete_account',
  [
    'id' => REQUEST_DELETE_ACCOUNT,
  ]
) ?>
