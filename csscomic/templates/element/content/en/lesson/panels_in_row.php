<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
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
<div class="cc-lesson-top__start">
  <p>
    If you style an HTML tag, you can only apply the styling to the tag and its contents. This is
    why with the previous lesson it was not possible to show the panels next to each other.
  </p>
  <p>
    To get multiple panels in a row, they must all be placed inside a <code>&lt;div&gt;</code>.
    This <code>&lt;div&gt;</code> is given the style name <code>panels</code>. That style makes the
    panels appear side by side.
  </p>
  <p>
    <strong>Note:</strong> It is important that all <code>&lt;div&gt;</code> tags with the style
    name <code>panel</code>, are placed within the <code>&lt;div&gt;</code> with the style name
    <code>panels</code>.
  </p>
  <p>
    To get multiple rows of panels, keep adding <code>&lt;div&gt;</code> with the style name
    <code>panel</code>. The <code>panels</code> style makes sure that panels are moved to a
    new row when there is no longer enough space in the current row.
  </p>
  <p>
    <strong>Note:</strong> make sure that each panel uses their own <code>&lt;div&gt;</code>
    with an opening and closing tag.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise: </strong>Create two rows with each having three panels.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel', ['simple' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
