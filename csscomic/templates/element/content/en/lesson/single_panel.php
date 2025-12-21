<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panel">
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Time for the first step towards creating a comic. Before we move on to the characters,
    we first need to create a panel where the characters will stand.
  </p>
  <p>
    You can easily create a panel in HTML by adding the style name <code>panel</code> to a
    <code>&lt;div&gt;</code> tag.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Create a single panel.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel', ['partial' => true]); ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
