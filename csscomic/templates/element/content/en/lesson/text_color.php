<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="back-yellow text-green">
  Green text with yellow background
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    It is possible to apply multiple style definitions to an HTML element. You do this by
    using multiple names in the <code>class</code> attribute, separated by a space.
  </p>
  <p>
    On the right you can see a number of new style definition names that allow you to
    adjust the text color.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Change both the text and background color of the text inside a
      <code>&lt;div&gt;</code>.
    </p>
    <p>
      <strong>Exercise:</strong> Try different color combinations to see which texts are readable
      and which are not (for example red text on a green background).
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/text') ?>
  <?= $this->contentElement('help/background') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
