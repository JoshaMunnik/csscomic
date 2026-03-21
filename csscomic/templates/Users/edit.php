<?php

use App\Controller\UsersController;
use App\Model\Constant\Language;
use App\Model\Enum\ButtonColorEnum;
use App\Model\View\IdViewModel;
use App\Model\View\Users\EditUserViewModel;
use App\View\ApplicationView;

/**
 * @var EditUserViewModel $data
 * @var ApplicationView $this
 */

?>
<div class="cc-main__page">
  <?= $this->Styling->Text->title($data->isNew() ? __('Create user') : __('Edit user')) ?>
  <?= $this->createForm($data) ?>
  <?= $this->Styling->Dialog->beginFormContainer() ?>
  <?= $this->Form->control(
    EditUserViewModel::EMAIL,
    [
      'label' => __('Email'),
      'type' => 'email',
      'required' => true
    ]
  ) ?>
  <?= $this->Form->control(
    EditUserViewModel::NAME,
    [
      'label' => __('Name'),
      'type' => 'text',
      'required' => true
    ]
  ) ?>
  <?= $this->Form->control(
    EditUserViewModel::PASSWORD,
    [
      'label' => $data->isNew()
        ? __('Password')
        : __('Password (leave empty to keep current password)'),
      'type' => 'password',
      'required' => $data->isNew()
    ]
  ) ?>
  <?= $this->Form->control(
    EditUserViewModel::ADMINISTRATOR,
    [
      'type' => 'checkbox',
      'label' => __('User is an administrator')
    ]
  ) ?>
  <?= $this->Form->control(
    EditUserViewModel::LANGUAGE_CODE,
    [
      'label' => __('Language'),
      'options' => Language::getList(),
      'type' => 'select',
      'required' => true
    ]
  ) ?>
  <?= $this->Styling->Dialog->beginFormButtons() ?>
  <?= $this->Form->button(__('Save')) ?>
  <?= $this->Styling->Button->link(
    __('Cancel'), UsersController::INDEX, ButtonColorEnum::SECONDARY
  ) ?>
  <?= $this->Styling->Dialog->endFormButtons() ?>
  <?= $this->Styling->Dialog->endFormContainer() ?>
  <?= $this->Form->hidden(IdViewModel::ID) ?>
  <?= $this->Form->end() ?>
</div>
