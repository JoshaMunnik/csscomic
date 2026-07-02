<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="batman eyes-sad">
    </div>
  </div>
  <div class="panel">
    <div class="robin eyes-think">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Er zijn verschillende stijlen om de gelaatsuitdrukking van een karakter te veranderen.
  </p>
  <p>
    Om deze stijlen te gebruiken, voeg je een extra stijl naam toe aan de <code>class</code>
    attribute van de karakter <code>&lt;div&gt;</code>.
  </p>
  <p>
    Deze stijlen werken zowel voor Batman als voor Robin.
  </p>
  <p>
    In deze les gaat het om de verschillende oog stijlen.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Creëer twee panelen; eentje met Batman die boos kijkt en eentje
      met Robin die nadenkt.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/eyes') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
