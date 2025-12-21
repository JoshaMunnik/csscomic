<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div>
  Text inside a div tag.
  <div>
    Nested tag text.
    <div>
      More  nesting.
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    In addition to text a <em>tag</em> can also contain other <em>tags</em>. This is called
    <em>nested tags</em>.
  </p>
  <p>
    You can think of a tag as a kind of box. In the box you can put text but also other boxes.
    In those boxes you can again put text and boxes. And so on.
  </p>
  <p>
    <strong>Note:</strong> It is important that every opening tag has a matching closing tag!
    Else the browser won't know where a tag starts and ends and how to display the page.
  </p>
  <p>
    If you make a mistake in the HTML code, the editor will point it out. While typing an
    <img src="/img/error-dot.png" alt="red dot"/> will appear next to one of the line numbers.
    If you hover over it with your mouse you will see a message describing the error. Error
    messages will also appear below the editor if you use the <code>update</code> button with
    HTML that contains errors.
  </p>
  <p>
    <strong>Note:</strong> HTML code that contains errors is <em>not</em> shown in the output
    section.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Enter some nested <code>div</code> tags in the code editor.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
