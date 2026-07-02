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
    Time for the first step towards creating a comic.
  </p>
  <p>
    As described before, this website uses style definitions you can use to create a comic.
  </p>
  <p>
    Before we move on to the characters, we first need to create a panel that contains the
    characters and their speech bubbles.
  </p>
  <p>
    You can create a panel in HTML by adding the style name <code>panel</code> to a
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
