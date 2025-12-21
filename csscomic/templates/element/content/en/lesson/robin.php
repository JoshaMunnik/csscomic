<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="batman">
    </div>
  </div>
  <div class="panel">
    <div class="robin">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Besides Batman, we have another main character: Robin.
  </p>
  <p>
    Adding Robin works the same way as Batman. You use a <code>&lt;div&gt;</code> tag with the
    style name <code>robin</code> and place it in a <code>&lt;div&gt;</code> that has
    a <code>panel</code> style.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Create two panels; one with Batman and one with Robin.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
