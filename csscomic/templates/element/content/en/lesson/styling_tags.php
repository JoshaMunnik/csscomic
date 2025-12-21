<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div>
  This is a <strong>strong text</strong>, while this is a <em>emphasized text</em>
</div>
<div>
  This is a <strong><em>strong and emphasized text</em></strong>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Sometimes you want to emphasize certain words or phrases in a text. The following tags
    are available:
  </p>
  <ul>
    <li>
      <code>&lt;strong&gt;</code> to indicate strong text. This text is usually displayed
      <strong>bold</strong>.
    </li>
    <li>
      <code>&lt;em&gt;</code> to indicate emphasized text. This text is usually displayed
      <em>italic</em>.
    </li>
  </ul>
  <p>
    The difference between these <em>tags</em> and the <code>div</code> tag is that text inside
    the <em>tags</em> is not displayed on a new line.
  </p>
  <p>
    You can also make text both strong and emphasized by using both tags. Make sure the tags are
    correctly nested.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Enter a text with some strong and emphasized words.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('tag', ['partial' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
