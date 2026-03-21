<?php

use App\Model\View\Account\ResetPasswordViewModel;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var ResetPasswordViewModel $resetPasswordData
 * @var array $backAction
 */

?>
<div class="cc-main__page">
  <?= $this->Styling->Text->title(__('Reset password')) ?>
  <?= $this->Form->create($resetPasswordData, ['templates' => 'form_styles']) ?>
  <?= $this->Styling->Dialog->beginFormContainer() ?>
  <?= $this->Form->control(
    ResetPasswordViewModel::NEW_PASSWORD,
    [
      'label' => __('New password'),
      'type' => 'password',
      'required' => true
    ],
  ) ?>
  <?= $this->Form->control(
    ResetPasswordViewModel::CONFIRM_PASSWORD,
    [
      'label' => __('Confirm password'),
      'type' => 'password',
      'required' => true
    ],
  ) ?>
  <?= $this->Form->hidden(ResetPasswordViewModel::RESET_TOKEN) ?>
  <?= $this->Styling->Dialog->beginFormButtons() ?>
  <?= $this->Form->button(__('Update'), ['type' => 'submit']) ?>
  <?= $this->Styling->Dialog->endFormButtons() ?>
  <?= $this->Styling->Dialog->endFormContainer() ?>
  <?= $this->Form->end() ?>
</div>
