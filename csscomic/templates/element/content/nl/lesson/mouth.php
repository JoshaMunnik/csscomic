<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panelen">
  <div class="paneel">
    <div class="batman mond-sip">
    </div>
  </div>
  <div class="paneel">
    <div class="robin mond-rond">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    In deze les gaan we door met het veranderen van de gelaatsuitdrukking van een karakter. Dit keer
    kijken we naar de verschillende mond stijlen.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Creëer twee panelen; eentje met Batman en eentje met Robin beide
      met verschillende mond stijlen.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/mouth') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
