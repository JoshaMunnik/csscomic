<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panelen">
  <div class="paneel">
    <div class="batman">
    </div>
  </div>
  <div class="paneel">
    <div class="robin">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Naast Batman hebben we nog een andere hoofdrol speler: Robin.
  </p>
  <p>
    Het toevoegen van Robin gaat op dezelfde manier als Batman. Je gebruikt
    een <code>&lt;div&gt;</code> tag met de stijl naam <code>robin</code> en
    plaatst deze in een <code>&lt;div&gt;</code> die een <code>paneel</code> stijl bevat.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Creëer twee panelen; eentje met Batman en eentje met Robin.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
