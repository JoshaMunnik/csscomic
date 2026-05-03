<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="bubble">
      Hi, I\'m Batman
    </div>
    <div class="batman">
    </div>
  </div>
  <div class="panel">
    <div class="bubble">
      Hi, and I\'m Robin
    </div>
    <div class="robin">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    This with lesson we will combine the speech bubbles with the characters.
  </p>
  <p>
    Both the speech bubble and the character have to use their own <code>&lt;div&gt;</code> tag
    with the correct style name. Both tags must be placed within a <code>&lt;div&gt;</code> with
    the style name <code>panel</code>.
  </p>
  <p>
    Pay attention that every <code>&lt;div&gt;</code> also has a matching <code>&lt;/div&gt;</code>.
    Even if there is no contents (like with the <code>&lt;div&gt;</code> for the characters).
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Create different panels that contain both a speech bubble and a
      character.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/bubble', ['partial' => true]) ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/mouth') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
