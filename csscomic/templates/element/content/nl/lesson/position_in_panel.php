<?php

/**
 * @var ApplicationView $this
 */

use App\Model\Enum\GapEnum;
use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel-two">
    <div class="bubble tail-right pos-x8">
      Naar rechts
    </div>
    <div class="batman pos-x10">
    </div>
    <div class="bubble pos-x2">
      Naar links
    </div>
    <div class="robin pos-x0">
    </div>
  </div>
  <div class="panel">
    <div class="bubble tail-off-panel pos-y8">
      Aan de onderkant.
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    In deze les kijken we naar het positioneren van karakters en tekstballonnen binnen een paneel.
  </p>
  <p>
    Om een karakter of tekstballon horizontaal te positioneren, voeg je een extra stijl naam toe
    aan de <code>class</code> attribute van het karakter of de ballon <code>&lt;div&gt;</code>. De
    stijl namen zijn <code>pos-x0</code> (helemaal links) tot en met <code>pos-x10</code>
    (helemaal rechts).
  </p>
  <p>
    Als je geen positie stijl toevoegt, wordt het karakter of de tekstballon standaard in het midden
    geplaatst (hetzelfde als <code>pos-x5</code>).
  </p>
  <p>
    Karakters staan altijd aan de onderkant van het paneel. Tekstballon kan je ook verticaal
    positioneren. Dit doe je door een extra stijl naam toe te voegen aan de <code>class</code>
    attribute van de ballon <code>&lt;div&gt;</code>. De stijl namen zijn <code>pos-y0</code>
    (helemaal bovenaan) tot en met <code>pos-y10</code> (helemaal onderaan).
  </p>
  <p>
    Als je geen verticale positie stijl toevoegt, worden de tekstballonnen standaard bovenaan het
    paneel geplaatst (hetzelfde als <code>pos-y0</code>).
  </p>
  <div>
    <?= $this->Styling->Layout->beginRow(GapEnum::DIALOG) ?>
    <?= $this->contentElement('help/pos_x_help') ?>
    <?= $this->contentElement('help/pos_y_help') ?>
    <?= $this->Styling->Layout->endRow() ?>
  </div>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Creëer een paneel met Batman en Robin, waarbij Batman aan de
      rechterkant staat en Robin aan de linkerkant. Voeg tekstballonnen toe voor zowel
      Batman als Robin.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/bubble', ['partial' => true]) ?>
  <?= $this->contentElement('help/position', ['partial' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
