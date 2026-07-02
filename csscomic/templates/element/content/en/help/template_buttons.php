<?php

use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

$layout3x2 = '
<div class="panels">
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
</div>
';
$layout3x3 = '
<div class="panels">
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
</div>
';
$layout4x4 = '
<div class="panels-four">
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
</div>
';
$layout4x3 = '
<div class="panels-four">
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
</div>
';

$example1 = '
<div class="panels">
  <div class="panel">
    <div class="bubble pos-x6">
      (text...)
    </div>
    <div class="batman">
    </div>
  </div>
  <div class="panel">
    <div class="bubble tail-right pos-x4">
      (text...)
    </div>
    <div class="robin">
    </div>
  </div>
  <div class="panel">
    <div class="bubble pos-x6">
      (text...)
    </div>
    <div class="batman">
    </div>
  </div>
  <div class="panel">
    <div class="bubble tail-right pos-x4">
      (text...)
    </div>
    <div class="robin">
    </div>
  </div>
  <div class="panel-two">
    <div class="bubble tail-right pos-x1">
      (text...)
    </div>
    <div class="batman pos-x1">
    </div>
    <div class="bubble pos-x9">
      (text...)
    </div>
    <div class="robin pos-x9">
    </div>
  </div>
</div>
';

$example2 = '
<div class="panels">
  <div class="panel-three">
    <div class="bubble tail-right pos-x1">
      (text...)
    </div>
    <div class="robin pos-x1">
    </div>
    <div class="bubble pos-x5">
      (text...)
    </div>
    <div class="batman pos-x5">
    </div>
    <div class="bubble pos-x9 pos-y8 tail-off-panel tail-right">
      (text...)
    </div>
  </div>
  <div class="panel-three">
    <div class="bubble tail-right pos-x1">
      (text...)
    </div>
    <div class="batman scare eyes-shock mouth-whisper pos-x1">
    </div>
    <div class="bubble pos-x5">
      (text...)
    </div>
    <div class="robin mouth-angry eyes-angry pos-x5">
    </div>
    <div class="bubble pos-x9 pos-y8 tail-off-panel tail-right">
      (text...)
    </div>
  </div>
  <div class="panel-three">
    <div class="bubble tail-right pos-x2">
      (text...)
    </div>
    <div class="robin pos-x2">
    </div>
    <div class="bubble pos-x8">
      (text...)
    </div>
    <div class="batman blush pos-x8">
    </div>
  </div>
</div>
';

?>
<?= $this->Styling->Layout->beginColumn() ?>
<div class="cc-lesson-code-block__container">
  <?= $this->element('code_button', ['caption' => 'Layout 3x2', 'code' => $layout3x2]) ?>
  <?= $this->element('code_button', ['caption' => 'Layout 3x3', 'code' => $layout3x3]) ?>
  <?= $this->element('code_button', ['caption' => 'Layout 4x3', 'code' => $layout4x3]) ?>
  <?= $this->element('code_button', ['caption' => 'Layout 4x4', 'code' => $layout4x4]) ?>
</div>
<div class="cc-lesson-code-block__container">
  <?= $this->element('code_button', ['caption' => 'Example 1', 'code' => $example1]) ?>
  <?= $this->element('code_button', ['caption' => 'Example 2', 'code' => $example2]) ?>
</div>
<?= $this->Styling->Layout->endColumn() ?>
