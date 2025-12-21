<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
A    text with    many spaces
and  line   breaks.

This line  comes  after  multiple line breaks.
';

?>
<div class="cc-lesson-top__start">
  <p>
    Although the browser displays the entered text as-is, there is a difference. If the text
    contains multiple spaces or line breaks, they are merged into a single space in the output.
    In the output there will always be only one space between each word.
  </p>
  <p>
    In this lesson you can see example code at the top-right. You can always enter your own text
    or use the <code>copy</code> button to place the example code into the editor.
  </p>
  <p>
    <strong>Note:</strong> If you use the <code>copy</code> button, the existing code in the
    editor will be overwritten.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Enter some text with extra spaces and line breaks.
      Then press the <code>update</code> button to see what happens.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
