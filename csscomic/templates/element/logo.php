<?php

use App\Controller\HomeController;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

echo $this->link(
  '<span class="cc-header__logo-css">CSS</span><span class="cc-header__logo-comic">Comic</span>',
  HomeController::INDEX,
  ['escape' => false, 'class' => 'cc-header__logo-container'],
);

