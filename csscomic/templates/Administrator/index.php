<?php

use App\Controller\AdministratorController;
use App\Controller\UsersController;
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

?>
<div class="cc-main__page">
  <?= $this->Styling->Text->title(__('Home for administrator')) ?>
  <?= $this->Styling->Layout->beginPageButtons() ?>
  <?= $this->Styling->Button->link(
    __('Users'),
    $this->url([UsersController::INDEX]),
    ButtonColorEnum::PRIMARY,
    true,
  ) ?>
  <?= $this->Styling->Button->link(
    __('Clear caches'),
    $this->url([AdministratorController::CLEAR_CACHE])
  ) ?>
  <?= $this->Styling->Button->normal(
    __('Edit profile'),
    ButtonColorEnum::PRIMARY,
    [
      HtmlAction::SHOW_DIALOG => '#'.EDIT_PROFILE,
    ],
  ) ?>
  <?= $this->Styling->Button->normal(
    __('Change password'),
    ButtonColorEnum::PRIMARY,
    [
      HtmlAction::SHOW_DIALOG => '#'.CHANGE_PASSWORD,
    ],
  ) ?>
  <?= $this->Styling->Layout->endPageButtons() ?>
</div>
<?= $this->element(
  'dialog/edit_profile', ['data' => $editProfileData, 'id' => EDIT_PROFILE]
) ?>
<?= $this->element(
  'dialog/change_password', ['data' => $changePasswordData, 'id' => CHANGE_PASSWORD]
) ?>
