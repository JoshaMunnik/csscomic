<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$codeFirst = '
<div class="panels">
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel-two">
  </div>
  <div class="panel">
  </div>
  <div class="panel-three">
  </div>
</div>
';
$codeSecond = '
<div class="panels-four">
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel-two">
  </div>
  <div class="panel-two">
  </div>
  <div class="panel-three">
  </div>
  <div class="panel">
  </div>
  <div class="panel-four">
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Standaard staan er drie panelen op een rij. Wil je vier panelen op een rij dan gebruik je de
    stijl naam <code>panels-four</code> in plaats van <code>panels</code>.
  </p>
  <p>
    Het is ook mogelijk om bredere panelen te maken die de ruimte van twee, drie of vier panelen
    innemen. Hiervoor gebruik je respectievelijk de stijl namen <code>panel-two</code>,
    <code>panel-three</code> en <code>panel-four</code> in plaats van <code>panel</code>.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening: </strong>Maak twee rijen met panelen, met op de eerste rij een extra breed
      paneel.
    </p>
    <p>
      <strong>Oefening: </strong>Maak twee rijen met elk vier panelen.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->element('code_block', ['code' => $codeFirst]) ?>
  <?= $this->element('code_block', ['code' => $codeSecond]) ?>
</div>
