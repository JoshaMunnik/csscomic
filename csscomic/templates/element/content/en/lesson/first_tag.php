<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div>
  Contents of my first tag
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    As explained in the first lesson, HTML consists of text and special codes. These codes are
    called <em>tags</em>.
  </p>
  <p>
    A tag is defined as follows: <code>&lt;<em>name</em>&gt;</code>.
    The <em>name</em> can have different values.
  </p>
  <p>
    Most tags can contain text and other tags, the so called <em>content</em> of a tag. To
    indicate the end of the content, you need to use a closing tag:
    <code>&lt;/<em>name</em>&gt;</code>.
  </p>
  <p>
    <strong>Important:</strong> take care that for every opening tag there is a matching closing
    tag. So that the browser can display the page correctly.
  </p>
  <p>
    A tag we will use often in the lessons is the <code>div</code> tag.
    This tag general usable tag, it is used to define parts on a web page.
    The <code>div</code> tag starts with <code>&lt;div&gt;</code> and ends with
    <code>&lt;/div&gt;</code>.
  </p>
  <p>
    You might wonder why a tag is being used, when the text with or without the tag looks the same.
    In the next lesson it will become clear why tags are being used.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Enter a <code>div</code> tag in the code editor, as in the
      example at the top right. If you do not want to type, you can click the <code>copy</code>
      button.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
