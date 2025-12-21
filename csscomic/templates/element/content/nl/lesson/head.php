<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panelen">
  <div class="paneel">
    <div class="batman bloos">
    </div>
  </div>
  <div class="paneel">
    <div class="robin bang">
    </div>
  </div>
  <div class="paneel">
    <div class="batman bloos draai-hoofd-rechts">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    In deze les kijken we naar stijlen om het gezicht van een karakter te veranderen door het
    toevoegen van stijlen.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Probeer de verschillende gezicht stijlen uit door twee panelen te
      maken; eentje met Batman die bloost en eentje met Robin die bang is.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/head') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
