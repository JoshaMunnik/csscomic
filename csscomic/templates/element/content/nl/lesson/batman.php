<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
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
    <code>panel</code> stijl bevat.
  </p>
  <p>
    <strong>Let op:</strong> het is belangrijk dat de <code>&lt;div&gt;</code> met de stijl naam
    <code>batman</code> altijd binnen een <code>&lt;div&gt;</code> met de stijl naam
    <code>panel</code> staat. Anders zal Batman niet zichtbaar zijn.
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
