<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$codeFirst = '
<div class="panels">
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel-two">
  </div>
  <div class="panel">
  </div>
  <div class="panel-three">
  </div>
</div>
';
$codeSecond = '
<div class="panels-four">
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel-two">
  </div>
  <div class="panel-two">
  </div>
  <div class="panel-three">
  </div>
  <div class="panel">
  </div>
  <div class="panel-four">
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    To get multiple panels in a row, they must all be placed inside a <code>&lt;div&gt;</code>.
    This <code>&lt;div&gt;</code> is given the style name <code>panels</code>. That style makes the
    panels appear side by side.
  </p>
  <p>
    By default there are three panels per row. If you want four panels per row use the style name
    <code>panels-four</code> instead of <code>panels</code>. To get multiple rows you can simply
    add more <code>&lt;div&gt;</code> elements with the style name <code>panel</code>; they will
    automatically wrap to the next row when there is no more space.
  </p>
  <p>
    It is also possible to create wider panels that take up the space of two, three or four panels.
    For that you use the style names <code>panel-two</code>, <code>panel-three</code> and
    <code>panel-four</code> respectively instead of <code>panel</code>.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise: </strong>Create two rows with three panels each.
    </p>
    <p>
      <strong>Exercise: </strong>Create two rows of panels, with an extra-wide panel on the first
      row.
    </p>
    <p>
      <strong>Exercise: </strong>Create two rows with four panels each.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->element('code_block', ['code' => $codeFirst]) ?>
  <?= $this->element('code_block', ['code' => $codeSecond]) ?>
</div>
