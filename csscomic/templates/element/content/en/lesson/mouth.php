<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="batman mouth-sad">
    </div>
  </div>
  <div class="panel">
    <div class="robin mouth-round">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    In this lesson we continue changing a character's facial expression. This time we look at
    the different mouth styles.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Create two panels; one with Batman and one with Robin, both
      with different mouth styles.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/mouth') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
