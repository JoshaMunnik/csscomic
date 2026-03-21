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
  <?= $this->Styling->Text->title(__('Delete account')) ?>
  <?= $this->Form->create($deleteAccountData, ['templates' => 'form_styles']) ?>
  <?= $this->Styling->Text->textBlock(
    __('Warning: Deleting your account is permanent and cannot be undone! All your data will be lost.')
  ) ?>
  <?= $this->Styling->Dialog->beginFormButtons() ?>
  <?= $this->Styling->Button->submit(
    __('I understand, delete my account'), ButtonColorEnum::DANGER
  ) ?>
  <?= $this->Styling->Dialog->endFormButtons() ?>
  <?= $this->Form->hidden(DeleteAccountViewModel::DELETE_TOKEN) ?>
  <?= $this->Form->end() ?>
</div>
