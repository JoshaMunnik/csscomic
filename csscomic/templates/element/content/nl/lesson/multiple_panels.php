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
    Een strip bestaat natuurlijk niet uit één paneel. Meerdere panelen kan je maken door
    meerdere <code>&lt;div&gt;</code> tags met de stijl naam <code>panel</code> toe te voegen.
  </p>
  <p>
    Er is wel een probleem, elk paneel wordt nu onder elkaar geplaatst. In de volgende les
    wordt een oplossing gegeven om panelen naast elkaar te plaatsen.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Maak meerdere panelen in HTML.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel', ['partial' => true]); ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
