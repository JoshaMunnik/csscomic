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
    Een tag begint altijd met een <code>&lt;</code> (kleiner-dan teken) gevolgd door de naam van de
    tag en eindigt met een <code>&gt;</code> (groter-dan teken). Bijvoorbeeld:
    <code>&lt;<em>naam</em>&gt;</code>.
  </p>
  <p>
    De meeste tags hebben een begintag en een eindtag. De eindtag lijkt op de begintag, maar heeft een
    <code>/</code> (schuine streep) direct na de <code>&lt;</code> (kleiner-dan teken).
    Bijvoorbeeld: <code>&lt;/<em>naam</em>&gt;</code>.
  </p>
  <p>
    Een tag die we veel in de lessen zullen gebruiken is de <code>div-tag</code>.
    Deze tag wordt gebruikt om een <em>secties</em> in een webpagina aan te geven.
    De <code>div-tag</code> begint met <code>&lt;div&gt;</code> en eindigt met
    <code>&lt;/div&gt;</code>.
  </p>
  <p>
    Als je een tag invoert zul je zien dat de editor deze een andere kleur geeft. Dit heet
    <em>syntax highlighting</em> en helpt je om de verschillende onderdelen van de code beter
    te onderscheiden.
  </p>
  <p>
    De editor zal ook de tekst tussen een begintag en eindtag automatisch inspringen. Hiermee
    wordt een duidelijker structuur binnen de code weergegeven.
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
