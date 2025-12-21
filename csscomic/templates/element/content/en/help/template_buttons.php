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

?>
<div class="cc-lesson-code-block__container">
  <?= $this->element('code_button', ['caption' => 'Layout 3x2' , 'code' => $layout3x2]) ?>
  <?= $this->element('code_button', ['caption' => 'Layout 3x3' , 'code' => $layout3x3]) ?>
  <?= $this->element('code_button', ['caption' => 'Layout 4x3' , 'code' => $layout4x3]) ?>
  <?= $this->element('code_button', ['caption' => 'Layout 4x4' , 'code' => $layout4x4]) ?>
</div>
