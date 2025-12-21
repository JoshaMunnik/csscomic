<?php

use App\Controller\LessonController;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

?>
<div class="cc-main__page">
  <?= $this->Styling->title(__('Welcome')) ?>
  <?= $this->contentElement('text/home') ?>
  <?= $this->Styling->smallTitle(__('To go to first lesson click:')) ?>
  <?= $this->Styling->beginButtons() ?>
  <?= $this->Styling->linkButton(__('First lesson'), $this->url(LessonController::VIEW)) ?>
  <?= $this->Styling->endButtons() ?>
  <?php if ($this->isLoggedIn()): ?>
    <?= $this->element('user_actions') ?>
  <?php endif; ?>
</div>
