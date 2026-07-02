<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="back-yellow">
  Text with yellow background
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    A webpage exists of a number of HTML tags. How these tags look (for example, color or text size)
    and how they are positioned (for example, at the top or at the bottom) is done
    through <em>styling</em>.
  </p>
  <p>
    The <em>styling</em> consists of a number of style definitions. Each website has their own
    set of style definitions. This website has style definitions that can be used to build a comic.
    The style definitions normally use their own <em>CSS</em> (Cascading Style Sheets) file.
  </p>
  <p>
    To apply a style definition with a certain <em>name</em> to an HTML tag, you must use the
    <code>class</code> attribute. The <code>class</code> attribute is added to the opening tag
    of an HTML element:
    <code>&lt;<em>tag</em> <strong>class</strong>="<em>name</em>"&gt;</code>.
  </p>
  <p>
    <strong>Info:</strong> A tag can contain multiple attributes. However, in these lessons
    we only use the <code>class</code> attribute.
  </p>
  <p>
    On the right you can see a number of style definition names that can be used to change the
    background color of the tag's content.
  </p>
  <p>
    With the next lesson you will also learn how to change the text color.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Change the background color of a
      <code>&lt;div&gt;</code> by using the <code>class</code> attribute with one of the
      style definition names you see on the right.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/background') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
