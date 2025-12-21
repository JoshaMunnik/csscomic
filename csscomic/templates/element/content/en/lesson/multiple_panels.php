<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panel">
</div>
<div class="panel">
</div>
<div class="panel">
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    A comic of course does not consist of a single panel. You can create multiple panels by
    adding multiple <code>&lt;div&gt;</code> tags with the class name <code>panel</code>.
  </p>
  <p>
    There is one problem: each panel is now placed below the previous one. The next lesson
    shows a solution so that panels are placed side by side.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Create multiple panels in HTML.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel', ['partial' => true]); ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
