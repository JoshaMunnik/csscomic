<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="bubble">
      <div>
        First line
      </div>
      <div>
        Second line
      </div>
    </div>
  </div>
  <div class="panel">
    <div class="bubble">
      Very <strong>strong words</strong> that <em>emphasizes</em>.
    </div>
  </div>
  <div class="panel">
    <div class="bubble">
      I am <span class="text-red">angry!</span>
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Text inside a speech bubble can be styled with HTML tags (such as <code>strong</code>) and
    styles (such as <code>text-red</code>) that you learned with earlier lessons.
  </p>
  <p>
    If the text is too long, it will automatically wrap across multiple lines. To split shorter
    texts across multiple lines, you can use <code>&lt;div&gt;</code> tags inside the speech bubble.
    Place each line of text in its own <code>&lt;div&gt;</code>.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Create a few panels with speech bubbles that contain different
      styles and multiple lines of text.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('tag') ?>
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/bubble') ?>
  <?= $this->contentElement('help/text') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
