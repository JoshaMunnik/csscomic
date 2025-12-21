<?php

use App\Controller\AccountController;
use App\Controller\HomeController;
use App\Model\Enum\ButtonColorEnum;
use App\Model\View\Account\RegistrationViewModel;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var RegistrationViewModel $data
 * @var string $id
 */

$termsLink = $this->Html->link(
  __('the terms and conditions'),
  $this->url(HomeController::TERMS),
  [
    'target' => '_blank',
    'rel' => 'noopener',
    'class' => 'cc-button__link'
  ]
);

?>
<?= $this->Styling->beginFormDialog($id, __('Register'), $data) ?>
<?= $this->Styling->beginFormContainer() ?>
<?= $this->Form->control(
  RegistrationViewModel::EMAIL,
  [
    'label' => __('Email'),
    'type' => 'email',
    'required' => true,
    'id' => false,
  ],
) ?>
<?= $this->Form->control(
  RegistrationViewModel::PASSWORD,
  [
    'label' => __('Password'),
    'type' => 'password',
    'required' => true,
    'id' => false,
  ],
) ?>
<?= $this->Form->control(
  RegistrationViewModel::CONFIRM_PASSWORD,
  [
    'label' => __('Confirm password'),
    'type' => 'password',
    'required' => true,
    'id' => false,
  ],
) ?>
<?= $this->Form->control(
  RegistrationViewModel::NAME,
  [
    'label' => __('Fantasy name'),
    'type' => 'text',
    'required' => true,
    'id' => false,
  ],
) ?>
<p>
  <?= __('You can choose any name you want, it does not have to be your real name.') ?>
</p>
<?= $this->Form->control(
  RegistrationViewModel::AGREE_TERMS,
  [
    'label' => __('Agree to {0}', $termsLink),
    'type' => 'checkbox',
    'required' => true,
    'id' => false,
    'escape' => false,
  ],
) ?>
<?= $this->Styling->endFormContainer() ?>
<?= $this->Styling->beginDialogButtons() ?>
<?= $this->Styling->submitButton(
  __('Register'), ButtonColorEnum::PRIMARY, AccountController::SUBMIT_REGISTER
) ?>
<?= $this->Styling->closeButton(__('Cancel')) ?>
<?= $this->Styling->endDialogButtons() ?>
<?= $this->Styling->endFormDialog() ?>
