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
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Now that we have the panels, we can add the main characters. Let’s start with Batman.
  </p>
  <p>
    To add Batman, use a <code>&lt;div&gt;</code> tag with the style name
    <code>batman</code> and place it inside the <code>&lt;div&gt;</code> that has a <code>panel</code> style.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Add Batman to a panel.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character', ['partial' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
