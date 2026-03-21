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
<?= $this->Styling->Dialog->beginFormDialog($id, __('Forgot password'), $data, AccountController::LOGIN) ?>
<?= $this->Styling->Text->textBlock(
  __('Please enter your email address. An email will be sent with instructions on how to reset your password.')
) ?>
<?= $this->Styling->Dialog->beginFormContainer() ?>
<?= $this->Form->control(
  EmailViewModel::EMAIL,
  [
    'label' => __('Email'),
    'type' => 'email',
    'required' => true,
    'id' => false,
  ],
) ?>
<?= $this->Styling->Dialog->endFormContainer() ?>
<?= $this->Styling->Dialog->beginDialogButtons() ?>
<?= $this->Styling->Button->submit(
  __('Send email'),
  ButtonColorEnum::PRIMARY,
  AccountController::SUBMIT_FORGOT_PASSWORD,
) ?>
<?= $this->Styling->Button->close(__('Cancel')) ?>
<?= $this->Styling->Dialog->endDialogButtons() ?>
<?= $this->Styling->Dialog->endFormDialog() ?>
