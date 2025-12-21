<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div>This is a test text.</div>
<div>
  This is a test text.
</div>
<div>

  This  is  a
    test
     text.

</div>
';

?>
<div class="cc-lesson-top__start">
  <p>
    Spaces and line breaks after the opening tag (<code>...&gt;</code>) and before the first word
    of the text are ignored. So <em>not</em> a single space is displayed.
  </p>
  <p>
    The same applies to spaces and line breaks between the last word of the text and
    the closing tag (<code>&lt;...</code>).
  </p>
  <p>
    The advantage is that we are free to structure the HTML code without it affecting
    how it is displayed in the browser. This makes it possible to add structure so the
    code is easier to read and understand.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Enter tags and text with extra spaces and line breaks.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
