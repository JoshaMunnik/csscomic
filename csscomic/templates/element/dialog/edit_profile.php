<?php

use App\Lib\Controller\ApplicationControllerBase;
use App\Model\Enum\ButtonColorEnum;
use App\Model\View\Account\EditProfileViewModel;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var EditProfileViewModel $data
 * @var string $id
 */

?>
<?=
$this->Styling->beginFormDialog($id, __('Edit your profile'), $data) ?>
<?= $this->Styling->beginFormContainer() ?>
<?= $this->Form->control(
  EditProfileViewModel::NAME,
  [
    'label' => __('Fantasy name'),
    'type' => 'text',
    'required' => true,
    'id' => false,
  ],
) ?>
<?= $this->Styling->endFormContainer() ?>
<?= $this->Styling->beginDialogButtons() ?>
<?= $this->Styling->submitButton(
  __('Update'),
  ButtonColorEnum::PRIMARY,
  ApplicationControllerBase::SUBMIT_EDIT_PROFILE,
) ?>
<?= $this->Styling->closeButton(__('Cancel')) ?>
<?= $this->Styling->endDialogButtons() ?>
<?= $this->Styling->endFormDialog() ?>
