<?php

use App\Model\Enum\ButtonColorEnum;
use App\Model\View\Account\DeleteAccountViewModel;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var DeleteAccountViewModel $deleteAccountData
 */

?>
<div class="cc-main__page">
  <?= $this->Styling->title(__('Delete account')) ?>
  <?= $this->element('messages') ?>
  <?= $this->Form->create($deleteAccountData, ['templates' => 'form_styles']) ?>
  <?= $this->Styling->textBlock(
    __('Warning: Deleting your account is permanent and cannot be undone! All your data will be lost.')
  ) ?>
  <?= $this->Styling->beginFormButtons() ?>
  <?= $this->Styling->submitButton(
    __('I understand, delete my account'), ButtonColorEnum::DANGER
  ) ?>
  <?= $this->Styling->endFormButtons() ?>
  <?= $this->Form->hidden(DeleteAccountViewModel::DELETE_TOKEN) ?>
  <?= $this->Form->end() ?>
</div>
