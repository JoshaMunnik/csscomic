<?php

use App\Controller\AccountController;
use App\Model\Entity\UserEntity;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var UserEntity $user
 * @var string $token
 */

?>
<h2>Dear <?= $user->name ?></h2>
<p>To delete your account at the css comic site, visit the following link:</p>
<p>
  <?= $this->Html->link(
    "Delete account", $this->url([AccountController::DELETE_ACCOUNT, $token, '_full' => true]),
  ) ?>
</p>
