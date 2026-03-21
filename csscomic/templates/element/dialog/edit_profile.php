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
$this->Styling->Dialog->beginFormDialog($id, __('Edit your profile'), $data) ?>
<?= $this->Styling->Dialog->beginFormContainer() ?>
<?= $this->Form->control(
  EditProfileViewModel::NAME,
  [
    'label' => __('Fantasy name'),
    'type' => 'text',
    'required' => true,
    'id' => false,
  ],
) ?>
<?= $this->Styling->Dialog->endFormContainer() ?>
<?= $this->Styling->Dialog->beginDialogButtons() ?>
<?= $this->Styling->Button->submit(
  __('Update'),
  ButtonColorEnum::PRIMARY,
  ApplicationControllerBase::SUBMIT_EDIT_PROFILE,
) ?>
<?= $this->Styling->Button->close(__('Cancel')) ?>
<?= $this->Styling->Dialog->endDialogButtons() ?>
<?= $this->Styling->Dialog->endFormDialog() ?>
