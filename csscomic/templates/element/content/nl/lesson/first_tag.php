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
    Een tag ziet er als volgt uit: <code>&lt;<em>naam</em>&gt;</code>. De <em>naam</em> kan
    verschillende dingen zijn. De naam van de tag bepaalt de type van de content waardoor. Voor
    sommige tag namen zal de browser extra acties uitvoeren (zoals het laden van een plaatje).
  </p>
  <p>
    De meeste tags bevatten tekst en andere tags. Om dit alles goed weer te kunnen geven moet
    de browser kunnen bepalen waar de content van een tag eindigt. Hiervoor wordt een eindtag
    gebruikt. De eindtag lijkt op de begintag en ziet er als volgt uit:
    <code>&lt;/<em>naam</em>&gt;</code>. Het verschil met de begintag is dat er na de
    <code>&lt;</code> meteen een <code>/</code> volgt.
  </p>
  <p>
    De content (tekst en/of andere tags) van een tag staat tussen de begintag en eindtag.
  </p>
  <p>
    Een tag die we veel in de lessen zullen gebruiken is de <code>div-tag</code>.
    Deze tag wordt gebruikt om een <em>secties</em> in een webpagina aan te geven.
    De <code>div-tag</code> begint met <code>&lt;div&gt;</code> en eindigt met
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
