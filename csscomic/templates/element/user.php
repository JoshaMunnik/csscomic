<?php

use App\Controller\AccountController;
use App\Controller\HomeController;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

const USER_POPUP = 'user-popup';

// get name of account controller (without Controller part)
$account = preg_replace(
  '/Controller$/',
  '',
  (new ReflectionClass(AccountController::class))->getShortName());

?>
<div class="cc-header__user-container">
  <?php if ($this->isLoggedIn()) : ?>
    <button class="cc-header__popup-button" id="<?= USER_POPUP ?>">
      <?= __('Welcome {0}', h($this->userName())) ?>
    </button>
    <div
      class="cc-popup__container"
      data-uf-popup-content="#<?= USER_POPUP ?>"
      data-uf-popup-position="horizontal"
    >
      <?= $this->Styling->linkButton(
        __('Home'),
        HomeController::INDEX,
      ) ?>
      <?= $this->Styling->linkButton(
        __('Sign out'),
        AccountController::LOGOUT,
      ) ?>
    </div>
  <?php else : ?>
    <?php if ($this->getRequest()->getParam('controller') !== $account) : ?>
      <?= $this->Styling->linkButton(__('Sign in'), AccountController::LOGIN) ?>
    <?php endif; ?>
  <?php endif; ?>
</div>
