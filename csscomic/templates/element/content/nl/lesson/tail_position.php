<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="bubble pos-tail0">
      Staart aan de linkerkant.
    </div>
  </div>
  <div class="panel">
    <div class="bubble pos-tail10">
      Staart aan de rechterkant.
    </div>
  </div>
  <div class="panel">
    <div class="bubble tail-off-panel pos-tail1">
      Staart aan linkerkant die naar buiten wijst.
    </div>
  </div>
  <div class="panel">
    <div class="bubble tail-off-panel tail-right pos-tail9">
      Staart aan de rechterkant die naar buiten wijst.
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Als je wilt kan je ook de staart van een tekstballon positioneren. Dit doe je door een extra
    stijl naam toe te voegen aan het <code>class</code> attribuut van de ballon
    <code>&lt;div&gt;</code>. De stijl namen zijn <code>pos-tail0</code> (helemaal links) tot
    en met <code>pos-tail10</code> (helemaal rechts).
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Probeer de verschillende staart posities uit.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/bubble') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
