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
    Tijd voor de eerste stap richting het maken van een strip.
  </p>
  <p>
    Zoals al eerder beschreven gebruikt deze website speciale stijl definities waarmee je HTML tags
    kan stijlen zodat er een strip ontstaat.
  </p>
  <p>
    Het eerst wat we nodig hebben is een paneel, waarin de karakters en hun tekst ballonnen komen
    te staan.
  </p>
  <p>
    Een paneel maak je in HTML door de stijl naam <code>panel</code> aan een
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
