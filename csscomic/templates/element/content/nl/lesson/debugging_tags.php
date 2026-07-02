<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$missingDiv = '
<div>
  Tekst binnen een div tag.
';

$missingStrong = '
<div>
  Ik ben <strong>sterk.
  Maar soms ook niet.
</div>
';

$wrongTag = '
<div>
  Ik ben <strong>sterk</em>.
</div>
';

$wrongColor = '
<div>
  Een <span class="text-rd">rode</span> tekst.
</div>
';

$nestingError = '
<div class="back-red">
  Rood
  <div class="back-green">
    Groen
    <div class="back-blue">
      Blauw
    </div>
';

?>
<div class="cc-lesson-top__start">
  <p>
    Mocht je een fout maken in de HTML code, dan zal de editor je hierop wijzen. Bij het invoeren
    zal er een <img src="/img/error-dot.png" alt="rooie stip"/> verschijnen bij één van de
    regelnummers. Als je hierover heen gaat met je muis krijg je een melding te zien van wat de
    fout is. Ook zullen er onder de editor foutmeldingen verschijnen als je de <code>update</code>
    button gebruikt met HTML code die fouten bevat.
  </p>
  <p>
    <strong>Let op:</strong> HTML code die fouten bevat wordt <em>niet</em> weergegeven in het
    uitvoer gedeelte.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Rechts staan een aantal HTML code blokken met fouten er in.
      Gebruik de kopieren button en probeer de fout op te lossen.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('tag') ?>
  <?= $this->contentElement('help/text') ?>
  <?= $this->contentElement('help/background') ?>
  <?= $this->Styling->Layout->beginColumn() ?>
  <?= $this->Styling->Layout->beginRow() ?>
  <?= $this->Styling->Layout->beginColumn() ?>
  <?= $this->element('code_block', ['code' => $missingDiv]) ?>
  <?= $this->element('code_block', ['code' => $missingStrong]) ?>
  <?= $this->element('code_block', ['code' => $wrongTag]) ?>
  <?= $this->Styling->Layout->endColumn() ?>
  <?= $this->element('code_block', ['code' => $nestingError]) ?>
  <?= $this->Styling->Layout->endRow() ?>
  <?= $this->element('code_block', ['code' => $wrongColor]) ?>
  <?= $this->Styling->Layout->endColumn() ?>
</div>
