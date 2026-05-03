<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panelen">
  <div class="paneel">
    <div class="batman">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Nu we de panelen hebben, kunnen we de hoofdrol spelers toevoegen. Laten we beginnen met Batman.
  </p>
  <p>
    Om Batman toe te voegen, gebruik je een <code>&lt;div&gt;</code> tag met de stijl naam
    <code>batman</code> en plaats je deze in de <code>&lt;div&gt;</code> die een
    <code>paneel</code> stijl bevat.
  </p>
  <p>
    <strong>Let op:</strong> het is belangrijk dat de <code>&lt;div&gt;</code> met de stijl naam
    <code>batman</code> altijd binnen een <code>&lt;div&gt;</code> met de stijl naam
    <code>paneel</code> staat. Anders zal Batman niet zichtbaar zijn.
  </p>
  <p>
    De <code>&lt;div&gt;</code> met de stijl naam <code>batman</code> bevat nooit content. Alle
    aanpassingen zullen via het <code>class</code> attribuut gebeuren. Hoewel er geen content
    is het wel belangrijk om nog steeds een <code>&lt;/div&gt;</code> te gebruiken. Anders raakt
    de browser in de war en zal de browser de web pagina niet goed weergeven.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Voeg Batman toe aan een paneel.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character', ['partial' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
