<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="bubble">
      Hallo, ik ben Batman
    </div>
    <div class="batman mouth-talk">
    </div>
  </div>
  <div class="panel">
    <div class="bubble">
      Hallo, en ik ben Robin
    </div>
    <div class="robin mouth-talk">
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
    met de stijl naam <code>panel</code> staan.
  </p>
  <p>
    <strong>Let op:</strong> zorg ervoor dat de <code>div</code> met de <code>bubble</code> naast
    de <code>div</code> staat met Batman of Robin en niet binnen de <code>div</code> met het
    karakter.
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
