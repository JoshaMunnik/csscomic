<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panelen">
  <div class="paneel">
    <div class="ballon">
      Hallo, ik ben Batman
    </div>
    <div class="batman">
    </div>
  </div>
  <div class="paneel">
    <div class="ballon">
      Hallo, en ik ben Robin
    </div>
    <div class="robin">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Bij deze les combineren we de ballonnen met de karakters.
  </p>
  <p>
    Zowel de ballon als een karakter moet een eigen <code>&lt;div&gt;</code> gebruiken met
    ieder de correct stijl namen. Beide tags moeten beide binnen een <code>&lt;div&gt;</code>
    met de stijl naam <code>paneel</code> staan.
  </p>
  <p>
    Let op dat elke <code>&lt;div&gt;</code> een <code>&lt;/div&gt;</code> bevat. Ook al is er geen
    content (zoals bij de <code>&lt;div&gt;</code> voor de karakters).
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Creëer verschillende panelen met zowel tekst ballonnen als
      karakters.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/bubble', ['partial' => true]) ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/mouth') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
