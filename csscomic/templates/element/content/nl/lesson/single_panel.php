<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="paneel">
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Tijd voor de eerste stap richting het maken van een strip. Voordat we naar de karakters gaan,
    moeten we eerst een paneel maken waarin de karakters komen te staan.
  </p>
  <p>
    Een paneel maak je eenvoudig in HTML door de stijl naam <code>paneel</code> aan een
    <code>&lt;div&gt;</code> tag toe te voegen.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Maak een enkel paneel.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel', ['partial' => true]); ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
