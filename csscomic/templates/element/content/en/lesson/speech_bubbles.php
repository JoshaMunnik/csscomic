<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$defaultBubble = '
<div class="panels">
  <div class="panel">
    <div class="bubble">
      Normal bubble
    </div>
  </div>
</div>
';

$longTail = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-tall">
      A bubble with a tall tail
    </div>
  </div>
</div>
';

$shortTail = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-short">
      A bubble with a short tail
    </div>
  </div>
</div>
';

$rightTail = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-right">
      A tail pointing right
    </div>
  </div>
</div>
';

$outsideLeft = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-off-panel">
      Someone talking outside
      the panel.
    </div>
  </div>
</div>
';

$outsideRight = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-right tail-off-panel">
      Someone talking outside the panel
      from the other side.
    </div>
  </div>
</div>
';

?>
<div class="cc-lesson-top__start">
  <p>
    Different facial expressions alone are not enough. Characters should, of course, be able to
    speak as well.
  </p>
  <p>
    To add text, create a separate <code>&lt;div&gt;</code> with the style name <code>bubble</code>
    inside the panel <code>&lt;div&gt;</code>. The text inside this
    <code>&lt;div&gt;</code> will be displayed as a speech bubble.
  </p>
  <p>
    By default, the tail of the bubble points to the left. There are different tail styles to
    adjust this.
  </p>
  <p>
    The style <code>tail-off-panel</code> can be used to show some text that is being said by
    someone outside the panel (for example, because the character is in another room).
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Create different panels with different types of speech bubbles.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/bubble', ['partial' => true]) ?>
  <?= $this->Styling->Layout->beginRow() ?>
  <?= $this->Styling->Layout->beginColumn() ?>
  <?= $this->element('code_block', ['code' => $defaultBubble]) ?>
  <?= $this->element('code_block', ['code' => $longTail]) ?>
  <?= $this->element('code_block', ['code' => $shortTail]) ?>
  <?= $this->Styling->Layout->endColumn() ?>
  <?= $this->Styling->Layout->beginColumn() ?>
  <?= $this->element('code_block', ['code' => $rightTail]) ?>
  <?= $this->element('code_block', ['code' => $outsideLeft]) ?>
  <?= $this->element('code_block', ['code' => $outsideRight]) ?>
  <?= $this->Styling->Layout->endColumn() ?>
  <?= $this->Styling->Layout->endRow() ?>
</div>
