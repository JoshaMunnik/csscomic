<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="bubble pos-tail-0">
      Tail at left position
    </div>
  </div>
  <div class="panel">
    <div class="bubble pos-tail-10">
      Tail at right position
    </div>
  </div>
  <div class="panel">
    <div class="bubble tail-off-panel pos-tail-1">
      Off-panel tail at left position
    </div>
  </div>
  <div class="panel">
    <div class="bubble tail-off-panel tail-right pos-tail-9">
      Off-panel tail at right position
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    If you want, you can also position the tail of a speech bubble. You do this by adding an extra
    style name to the <code>class</code> attribute of the bubble <code>&lt;div&gt;</code>. The style
    names are <code>pos-tail-0</code> (all the way left) up to and including
    <code>pos-tail-10</code> (all the way right).
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Try out the different tail positions.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/bubble') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
