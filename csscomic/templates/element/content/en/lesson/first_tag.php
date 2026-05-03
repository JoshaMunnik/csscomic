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
    The <em>name</em> can have different values. The name of the tag determines the type of content.
    The browser may perform extra actions based on the tag name (such as loading an image).
  </p>
  <p>
    Most tags can contain text and other tags. To be able to display these correctly, the browser
    has to know when the contents of a tag ends. This is done by using a closing tag.
    The closing tag looks like the opening tag and is defined as follows:
    <code>&lt;/<em>name</em>&gt;</code>. The difference with the opening tag is that the
    <code>&lt;</code> is immediately followed by a <code>/</code>.
  </p>
  <p>
    The content (text and/or other tags) for a tag is placed between the opening and closing tag.
  </p>
  <p>
    A tag we will use often in the lessons is the <code>div</code> tag.
    This tag is used to define some form of section on a web page.
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
      example at the top right.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
