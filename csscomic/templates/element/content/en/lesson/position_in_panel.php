<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel-two">
    <div class="bubble tail-right pos-x8">
      To the right
    </div>
    <div class="batman pos-x10">
    </div>
    <div class="bubble pos-x2">
      To the left
    </div>
    <div class="robin pos-x0">
    </div>
  </div>
  <div class="panel">
    <div class="bubble tail-off-panel pos-y8">
      At the bottom
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    In this lesson we look at positioning characters and speech bubbles within a panel.
  </p>
  <p>
    To position a character or speech bubble horizontally, add an extra style name to
    the <code>class</code> attribute of the character or bubble <code>&lt;div&gt;</code>. The style
    names are <code>pos-x0</code> (far left) through <code>pos-x10</code> (far right).
  </p>
  <p>
    If you don't add a position style, the character or speech bubble is placed in the center
    by default (the same as using <code>pos-x5</code>).
  </p>
  <p>
    Characters are always placed at the bottom of the panel. Speech bubbles however can also
    be positioned vertically. You can position a speech bubble vertically by adding an extra style
    name to the <code>class</code> attribute of the bubble <code>&lt;div&gt;</code>. The style names
    are <code>pos-y0</code> (top) through <code>pos-y10</code> (bottom).
  </p>
  <p>
    If you don't add a vertical position style, speech bubbles are placed at the top of the panel
    by default (the same as using <code>pos-y0</code>).
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Create a panel with Batman and Robin, with Batman on the
      right and Robin on the left. Add speech bubbles for both Batman and Robin.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/bubble', ['partial' => true]) ?>
  <?= $this->contentElement('help/position', ['partial' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
