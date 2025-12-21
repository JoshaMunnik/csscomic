<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panelen">
  <div class="paneel">
    <div class="ballon">
      Gewone balloon
    </div>
  </div>
  <div class="paneel">
    <div class="ballon staart-lang">
      Een balloon met een lange staart
    </div>
  </div>
  <div class="paneel">
    <div class="ballon staart-kort">
      Een balloon met een korte staart
    </div>
  </div>
  <div class="paneel">
    <div class="ballon staart-rechts">
      Een staart die naar rechts wijst.
    </div>
  </div>
  <div class="paneel">
    <div class="ballon staart-buiten">
      Iemand die buiten het paneel iets zegt.
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Met alleen verschillende gezichtsuitdrukkingen zijn we er nog niet. De karakters moeten
    natuurlijk ook iets kunnen zeggen.
  </p>
  <p>
    Om een tekst toe te voegen moet je een eigen <code>&lt;div&gt;</code> met de stijl naam
    <code>ballon</code> toevoegen binnen de <code>paneel</code> <code>&lt;div&gt;</code>. De tekst
    binnen deze <code>&lt;div&gt;</code> wordt dan weergegeven als een tekstballon.
  </p>
  <p>
    Standaard wijst de staart van de ballon naar links. Er zijn verschillende staart stijlen om
    deze aan te passen.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Creëer verschillende panelen met verschillende soorten
      tekstballonnen.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/bubble', ['partial' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
