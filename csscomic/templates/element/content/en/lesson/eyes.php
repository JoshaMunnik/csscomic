<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="batman eyes-sad">
    </div>
  </div>
  <div class="panel">
    <div class="robin eyes-think">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    There are different styles to change a character's facial expression.
  </p>
  <p>
    To use these styles, add an extra style name to the <code>class</code>
    attribute of the character <code>&lt;div&gt;</code>.
  </p>
  <p>
    These styles work for both Batman and Robin.
  </p>
  <p>
    This lesson is about the different eye styles.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Create two panels; one with Batman looking angry and one
      with Robin thinking.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/eyes') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
