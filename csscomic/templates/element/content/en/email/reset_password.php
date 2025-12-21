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
<p>To change your password for the css comic site, visit the following link:</p>
<p>
  <?= $this->Html->link(
    "New password", $this->url([AccountController::RESET_PASSWORD, $token, '_full' => true]),
  ) ?>
</p>
