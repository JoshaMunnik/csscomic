<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$missingDiv = '
<div>
  Text within a div tag.
';

$missingStrong = '
<div>
  I\'m <strong>strong.
  But sometimes not.
</div>
';

$wrongTag = '
<div>
  I\'m <strong>strong</em>.
</div>
';

$wrongColor = '
<div>
  A <span class="text-gren">green</span> text.
</div>
';

$nestingError = '
<div class="back-red">
  Red
  <div class="back-green">
    Green
    <div class="back-blue">
      Blue
    </div>
';



?>
<div class="cc-lesson-top__start">
  <p>
    If you make a mistake in the HTML code, the editor will point it out. While typing an
    <img src="/img/error-dot.png" alt="red dot"/> will appear next to one of the line numbers.
    If you hover over it with your mouse, you will see a message describing the error. Error
    messages will also appear below the editor if you use the <code>update</code> button with
    HTML that contains errors.
  </p>
  <p>
    <strong>Note:</strong> HTML code that contains errors is <em>not</em> shown in the output
    section.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> At the right that are number of HTML code blocks with errors.
      Use the copy button and try to solve the error.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('tag') ?>
  <?= $this->contentElement('help/text') ?>
  <?= $this->contentElement('help/background') ?>
  <?= $this->Styling->Layout->beginColumn() ?>
  <?= $this->Styling->Layout->beginRow() ?>
  <?= $this->Styling->Layout->beginColumn() ?>
  <?= $this->element('code_block', ['code' => $missingDiv]) ?>
  <?= $this->element('code_block', ['code' => $missingStrong]) ?>
  <?= $this->element('code_block', ['code' => $wrongTag]) ?>
  <?= $this->Styling->Layout->endColumn() ?>
  <?= $this->element('code_block', ['code' => $nestingError]) ?>
  <?= $this->Styling->Layout->endRow() ?>
  <?= $this->element('code_block', ['code' => $wrongColor]) ?>
  <?= $this->Styling->Layout->endColumn() ?>
</div>
