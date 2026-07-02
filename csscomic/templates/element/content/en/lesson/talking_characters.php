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
    <div class="batman mouth-talk">
    </div>
  </div>
  <div class="panel">
    <div class="bubble">
      Hi, and I\'m Robin
    </div>
    <div class="robin mouth-talk">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    With this lesson we will combine the speech bubbles with the characters.
  </p>
  <p>
    Both the speech bubble and the character have to use their own <code>&lt;div&gt;</code> tag
    with the correct style name. Both tags must be placed within a <code>&lt;div&gt;</code> with
    the style name <code>panel</code>.
  </p>
  <p>
    <strong>Note:</strong> take care that the <code>div</code> with the <code>bubble</code> is
    placed next to the <code>div</code> with Batman or Robin, and not inside the <code>div</code>
    from the character.
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
