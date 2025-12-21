<?php

use App\Controller\HomeController;
use App\Model\Entity\UserEntity;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var UserEntity $user
 */

?>
<h2>Dear <?= $user->name ?></h2>
<p>Welcome at the css comic site.</p>
<p>
  <?= $this->Html->link("Visit the site", $this->url([HomeController::INDEX, '_full' => true])) ?>
</p>
