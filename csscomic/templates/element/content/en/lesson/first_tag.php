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
    A tag always starts with a <code>&lt;</code> (less-than sign) followed by the name of the
    tag and ends with a <code>&gt;</code> (greater-than sign). For example:
    <code>&lt;<em>name</em>&gt;</code>.
  </p>
  <p>
    Most tags have an opening and a closing tag. The closing tag looks like the opening tag but has a
    <code>/</code> (slash) immediately after the <code>&lt;</code> (less-than sign).
    For example: <code>&lt;/<em>name</em>&gt;</code>.
  </p>
  <p>
    A tag we will use often in the lessons is the <code>div</code> tag.
    This tag is used to denote a section on a web page.
    The <code>div</code> tag starts with <code>&lt;div&gt;</code> and ends with
    <code>&lt;/div&gt;</code>.
  </p>
  <p>
    When you type a tag you will see the editor give it a different color. This is called
    <em>syntax highlighting</em> and helps you distinguish the different parts of the code.
  </p>
  <p>
    The editor will also automatically indent the content between an opening and closing tag. This makes
    the structure of the code clearer.
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
