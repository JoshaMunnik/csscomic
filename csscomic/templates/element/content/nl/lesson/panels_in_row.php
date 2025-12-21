<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$codeFirst = '
<div class="panelen">
  <div class="paneel">
  </div>
  <div class="paneel">
  </div>
  <div class="paneel">
  </div>
  <div class="paneel-twee">
  </div>
  <div class="paneel">
  </div>
  <div class="paneel-drie">
  </div>
</div>
';
$codeSecond = '
<div class="panelen-vier">
  <div class="paneel">
  </div>
  <div class="paneel">
  </div>
  <div class="paneel">
  </div>
  <div class="paneel">
  </div>
  <div class="paneel-twee">
  </div>
  <div class="paneel-twee">
  </div>
  <div class="paneel-drie">
  </div>
  <div class="paneel">
  </div>
  <div class="paneel-vier">
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Om meerdere panelen op een rij te krijgen, moeten ze allen in een <code>&lt;div&gt;</code>
    geplaatst worden. Deze <code>&lt;div&gt;</code> krijgt de stijl naam <code>panelen</code>.
    Deze stijl zorgt ervoor dat de panelen naast elkaar komen te staan.
  </p>
  <p>
    Standaard staan er drie panelen op een rij. Wil je vier panelen op een rij dan gebruik je de
    stijl naam <code>panelen-vier</code> in plaats van <code>panelen</code>. Om meerdere rijen te
    krijgen kan je gewoon meer <code>&lt;div&gt;</code> met de stijl naam <code>paneel</code>
    toevoegen; deze worden dan automatisch naar de volgende rij verplaatst als er geen ruimte
    meer is.
  </p>
  <p>
    Het is ook mogelijk om bredere panelen te maken die de ruimte van twee, drie of vier panelen
    innemen. Hiervoor gebruik je respectievelijk de stijl namen <code>paneel-twee</code>,
    <code>paneel-drie</code> en <code>paneel-vier</code> in plaats van <code>paneel</code>.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening: </strong>Maak twee rijen met elk drie panelen.
    </p>
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
