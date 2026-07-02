<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$defaultBallon = '
<div class="panels">
  <div class="panel">
    <div class="bubble">
      Gewone balloon
    </div>
  </div>
</div>
';

$longTail = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-long">
      Een balloon met een lange staart
    </div>
  </div>
</div>
';

$shortTail = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-short">
      Een balloon met een korte staart
    </div>
  </div>
</div>
';

$rightTail = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-right">
      Een staart die naar rechts wijst.
    </div>
  </div>
</div>
';

$outsideLeft = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-off-panel">
      Iemand die buiten het paneel
      iets zegt.
    </div>
  </div>
</div>
';

$outsideRight = '
<div class="panels">
  <div class="panel">
    <div class="bubble tail-right tail-off-panel">
      Iemand die aan de andere kant
      buiten het paneel staat.
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
    <code>bubble</code> toevoegen binnen de <em>panel</em> <code>&lt;div&gt;</code>. De tekst
    binnen deze <code>&lt;div&gt;</code> wordt dan weergegeven als een tekstballon.
  </p>
  <p>
    Standaard wijst de staart (tail) van de ballon (bubble) naar links. Er zijn verschillende staart
    stijlen om deze aan te passen.
  </p>
  <p>
    De stijl <code>tail-off-panel</code> kan je gebruiken door een tekst te tonen die door iemand
    buiten het panel wordt gezegd (bijvoorbeeld omdat het karakter in een andere kamer is).
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
  <?= $this->Styling->Layout->beginRow() ?>
  <?= $this->Styling->Layout->beginColumn() ?>
  <?= $this->element('code_block', ['code' => $defaultBallon]) ?>
  <?= $this->element('code_block', ['code' => $longTail]) ?>
  <?= $this->element('code_block', ['code' => $shortTail]) ?>
  <?= $this->Styling->Layout->endColumn() ?>
  <?= $this->Styling->Layout->beginColumn() ?>
  <?= $this->element('code_block', ['code' => $rightTail]) ?>
  <?= $this->element('code_block', ['code' => $outsideLeft]) ?>
  <?= $this->element('code_block', ['code' => $outsideRight]) ?>
  <?= $this->Styling->Layout->endColumn() ?>
  <?= $this->Styling->Layout->endRow() ?>
</div>
