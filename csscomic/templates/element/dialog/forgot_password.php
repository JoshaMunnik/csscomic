<?php

use App\Controller\AccountController;
use App\Model\Enum\ButtonColorEnum;
use App\Model\View\Account\EmailViewModel;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var EmailViewModel $data
 * @var string $id
 */

?>
<?= $this->Styling->beginFormDialog($id, __('Forgot password'), $data, AccountController::LOGIN) ?>
<?= $this->Styling->textBlock(
  __('Please enter your email address. An email will be sent with instructions on how to reset your password.')
) ?>
<?= $this->Styling->beginFormContainer() ?>
<?= $this->Form->control(
  EmailViewModel::EMAIL,
  [
    'label' => __('Email'),
    'type' => 'email',
    'required' => true,
    'id' => false,
  ],
) ?>
<?= $this->Styling->endFormContainer() ?>
<?= $this->Styling->beginDialogButtons() ?>
<?= $this->Styling->submitButton(
  __('Send email'),
  ButtonColorEnum::PRIMARY,
  AccountController::SUBMIT_FORGOT_PASSWORD,
) ?>
<?= $this->Styling->closeButton(__('Cancel')) ?>
<?= $this->Styling->endDialogButtons() ?>
<?= $this->Styling->endFormDialog() ?>
