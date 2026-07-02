<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="bubble">
      <div>
        Eerste regel
      </div>
      <div>
        Tweede regel
      </div>
    </div>
    <div class="batman">
    </div>
  </div>
  <div class="panel">
    <div class="bubble">
      Erg <strong>sterke woorden</strong> die <em>benadrukken</em>.
    </div>
    <div class="robin mouth-to-right">
    </div>
  </div>
  <div class="panel">
    <div class="bubble">
      Ik ben <span class="text-red">boos!</span>
    </div>
    <div class="batman mouth-angry eyes-angry">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    De tekst binnen een tekstballon kan je stijlen met HTML tags (zoals <code>strong</code>) en
    stijlen (zoals <code>text-red</code>) die je bij eerdere lessen geleerd hebt.
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
