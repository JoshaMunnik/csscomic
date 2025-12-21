<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="achter-geel">
  <span class="tekst-groen">
    Groene tekst
  </span>
   en
   <span class="tekst-blauw achter-oranje">
     blauwe tekst met oranje achtergrond
   </span>
   met gele achtergrond voor de rest.
</div>
<div>
  Dit is een <strong class="tekst-rood">Boze Tekst!</strong>
</div>
<div>
  Ik voel mij <em class="achter-paars tekst-wit">zo paars</em>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    In de afgelopen twee lessen hebben we de <code>class</code> attribuut alleen gebruikt bij de
    <code>&lt;div&gt;</code> tag. Je kan de <code>class</code> attribuut echter ook in andere
    tags gebruiken zoals de <code>&lt;strong&gt;</code> en <code>&lt;em&gt;</code> tags.
  </p>
  <p>
    Mocht je alleen de kleur van een stuk tekst willen aanpassen, dan kan je de
    <code>&lt;span&gt;</code> tag gebruiken. Deze tag heeft geen speciale betekenis, maar is er
    alleen om een stuk tekst te kunnen stijlen.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Pas de tekstkleur en achtergrondkleur aan van verschillende stukken
      tekst binnen een <code>&lt;div&gt;</code> met behulp van de <code>&lt;span&gt;</code>,
      <code>&lt;strong&gt;</code> en <code>&lt;em&gt;</code> tags.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('tag') ?>
  <?= $this->contentElement('help/text') ?>
  <?= $this->contentElement('help/background') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
