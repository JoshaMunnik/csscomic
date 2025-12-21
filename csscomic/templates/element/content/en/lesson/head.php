<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="batman blush">
    </div>
  </div>
  <div class="panel">
    <div class="robin scare">
    </div>
  </div>
  <div class="panel">
    <div class="batman blush rotate-head-right">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    In this lesson we look at styles to change a characters face by adding style names.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Try the different face styles by creating two panels; one with
      Batman blushing and one with Robin looking scared.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/head') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
