<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div>
  Tekst binnen mijn eerste tag
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Zoals in de eerste les is uitgelegd, bestaat HTML uit tekst en speciale codes. Deze codes worden
    <em>tags</em> genoemd.
  </p>
  <p>
    Een <em>tag</em> ziet er als volgt uit: <code>&lt;<em>naam</em>&gt;</code>. De <em>naam</em> kan
    verschillende dingen zijn.
  </p>
  <p>
    De meeste tags bevatten tekst en andere tags, de zogenaamde <em>content</em> van een tag. Om
    het einde van de content aan te geven, moet je een eindtag gebruiken:
    <code>&lt;/<em>naam</em>&gt;</code>.
  </p>
  <p>
    <strong>Belangrijk:</strong> let er op dat er voor elke begintag er ook een eindtag is; zodat
    de browser de webpagina goed kan weergeven.
  </p>
  <p>
    Een tag die we veel in de lessen zullen gebruiken is de <code>div-tag</code>.
    Deze tag is een algemene tag, die wordt gebruikt om <em>gedeeltes</em> in een webpagina aan
    te geven. De <code>div-tag</code> begint met <code>&lt;div&gt;</code> en eindigt met
    <code>&lt;/div&gt;</code>.
  </p>
  <p>
    Je zal je misschien afvragen waarom er een tag gebuikt wordt, de tekst met of zonder tag
    ziet er precies hetzelfde uit. In de volgende les wordt duidelijk waarom je tags gebruikt.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Voer een <code>div-tag</code> in de code editor in, zoals in het
      voorbeeld rechtsboven.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
