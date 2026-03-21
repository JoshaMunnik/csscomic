<?php

use App\Controller\LessonController;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

?>
<div class="cc-main__page">
  <?= $this->Styling->Text->title(__('Welcome')) ?>
  <?= $this->contentElement('text/home') ?>
  <?= $this->Styling->Text->smallTitle(__('To go to first lesson click:')) ?>
  <?= $this->Styling->Layout->beginButtons() ?>
  <?= $this->Styling->Button->link(__('First lesson'), $this->url(LessonController::VIEW)) ?>
  <?= $this->Styling->Layout->endButtons() ?>
  <?php if ($this->isLoggedIn()): ?>
    <?= $this->element('user_actions') ?>
  <?php endif; ?>
</div>
