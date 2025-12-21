<?php

use App\Controller\AccountController;
use App\Model\Constant\HtmlAction;
use App\Model\Enum\ButtonColorEnum;
use App\Model\View\Account\EmailViewModel;
use App\Model\View\Account\LoginViewModel;
use App\Model\View\Account\RegistrationViewModel;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var ?LoginViewModel $loginData
 * @var ?EmailViewModel $forgotPasswordData
 * @var ?RegistrationViewModel $registrationData
 */

$loginData ??= new LoginViewModel();
$forgotPasswordData ??= new EmailViewModel();
$registrationData ??= new RegistrationViewModel();

$forgotPasswordId = 'forgot-password';
$registerId = 'register';

?>
<div class="cc-main__page">
  <?= $this->Styling->title(__('Login')) ?>
  <?= $this->element('messages') ?>
  <?= $this->createForm($loginData, AccountController::LOGIN) ?>
  <?= $this->Styling->beginFormContainer() ?>
  <?= $this->Form->control(
    LoginViewModel::EMAIL,
    [
      'label' => __('Email'),
      'type' => 'email',
      'required' => true
    ],
  ) ?>
  <?= $this->Form->control(
    LoginViewModel::PASSWORD,
    [
      'label' => __('Password'),
      'type' => 'password',
      'required' => true,
    ],
  ) ?>
  <?= $this->Form->control(
    LoginViewModel::REMEMBER_ME,
    [
      'label' => __('Keep me logged in.'),
      'type' => 'checkbox',
    ],
  ) ?>
  <?= $this->Styling->beginFormButtons() ?>
  <?= $this->Form->button(__('Sign in'), ['type' => 'submit']) ?>
  <?= $this->Styling->formButtonSpacer() ?>
  <?= $this->Styling->textButton(
    __('Forgot your password?'),
    [
      HtmlAction::SHOW_DIALOG => '#'.$forgotPasswordId,
    ],
  ) ?>
  <?= $this->Styling->endFormButtons() ?>
  <?= $this->Styling->endFormContainer() ?>
  <?= $this->Form->end() ?>
  <p>
    <?= __('Don\'t have an account yet? Click:') ?>
  </p>
  <?= $this->Styling->button(
    __('Create account'),
    ButtonColorEnum::PRIMARY,
    [
      HtmlAction::SHOW_DIALOG => '#'.$registerId,
    ],
  ) ?>
</div>
<?= $this->element(
  'dialog/forgot_password',
  [
    'data' => $forgotPasswordData,
    'id' => $forgotPasswordId,
  ]
) ?>
<?= $this->element(
  'dialog/register_user',
  [
    'data' => $registrationData,
    'id' => $registerId,
  ]
) ?>
