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
<h2>Beste <?= $user->name ?></h2>
<p>Om je account te verwijderen van de css comic site, bezoek de volgende link:</p>
<p>
  <?= $this->Html->link(
    "Verwijder account", $this->url([AccountController::DELETE_ACCOUNT, $token, '_full' => true]),
  ) ?>
</p>
