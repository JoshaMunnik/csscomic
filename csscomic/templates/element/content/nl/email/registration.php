<?php

use App\Controller\HomeController;
use App\Model\Entity\UserEntity;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var UserEntity $user
 */

?>
<h2>Beste <?= $user->name ?></h2>
<p>Welkom op de css comic site.</p>
<p>
  <?= $this->Html->link("Bezoek de site", $this->url([HomeController::INDEX, '_full' => true])) ?>
</p>
