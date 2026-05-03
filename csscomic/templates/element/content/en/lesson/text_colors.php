<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="back-yellow">
  <span class="text-green">
    Green text
  </span>
   and
   <span class="text-blue back-orange">
     blue text with orange background
   </span>
   with yellow background for the rest
</div>
<div>
  This is <strong class="text-red">Angry Text!</strong>
</div>
<div>
  I feel <em class="back-purple text-white">so purple</em>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    You can use the <code>class</code> attribute with other tags than the
    <code>&lt;div&gt;</code> tag. You also use the <code>class</code> attribute
    with the <code>&lt;strong&gt;</code> and <code>&lt;em&gt;</code> tags.
  </p>
  <p>
    If you only want to change the color of a piece of text, you can use the
    <code>&lt;span&gt;</code> tag. This tag has no special meaning; it only exists to allow
    styling a piece of text.
  </p>
  <p>
    <strong>Note:</strong> The example on the right contains a text that uses multiple lines.
    This is only done to make the HTML code more clear. In the output the text will be shown
    on a single line.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Change the text color and background color of different pieces of
      text inside a <code>&lt;div&gt;</code> using the <code>&lt;span&gt;</code>,
      <code>&lt;strong&gt;</code> and <code>&lt;em&gt;</code> tags.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('tag') ?>
  <?= $this->contentElement('help/text') ?>
  <?= $this->contentElement('help/background') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
