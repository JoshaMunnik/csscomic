<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panelen">
  <div class="paneel">
    <div class="ballon">
      <div>
        Eerste regel
      </div>
      <div>
        Tweede regel
      </div>
    </div>
  </div>
  <div class="paneel">
    <div class="ballon">
      Erg <strong>sterke woorden</strong> die <em>benadrukken</em>.
    </div>
  </div>
  <div class="paneel">
    <div class="ballon">
      I ben <span class="tekst-rood">boos!</span>
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    De tekst binnen een tekstballon kan je stijlen met HTML tags (zoals <code>strong</code>) en
    stijlen (zoals <code>tekst-rood</code>) die je bij eerdere lessen geleerd hebt.
  </p>
  <p>
    Als de tekst te lang is, zal deze automatisch over meerdere regels verdeeld worden. Om kortere
    teksten over meerdere regels te verdelen, kan je meerdere <code>&lt;div&gt;</code> tags gebruiken
    binnen de tekstballon. Plaats elke tekstregel in zijn eigen <code>&lt;div&gt;</code>.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Creëer een paar panelen met tekstballonnen die verschillende
      stijlen en meerdere regels tekst bevatten.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('tag') ?>
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/bubble') ?>
  <?= $this->contentElement('help/text') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
