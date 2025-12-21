<?php

/**
 * @var ApplicationView $this
 * @var bool $first
 */

use App\View\ApplicationView;

?>
<div class="cc-lesson-top__start">
  <?php if (isset($first)) : ?>
    <p>
      Creëer jouw eerste stripverhaal!
    </p>
    <p>
      Helemaal rechts staan een aantal buttons om een paneel layout in de code editor te plaatsen.
    </p>
    <p>
      Verder zie je alle tags en stijlen die we in de afgelopen lessen hebben behandeld.
    </p>
  <p>
    Mocht je een stripverhaal afhebben en er nog een willen maken, kies dan de volgende les. Je kan tot
    10 verschillende stripverhalen maken.
  </p>
  <?php else : ?>
    <p>
      Creëer een nieuw stripverhaal.
    </p>
  <?php endif; ?>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('tag') ?>
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/bubble') ?>
  <?= $this->contentElement('help/text') ?>
  <?= $this->contentElement('help/character') ?>
  <?= $this->contentElement('help/eyes') ?>
  <?= $this->contentElement('help/mouth') ?>
  <?= $this->contentElement('help/head') ?>
  <?= $this->contentElement('help/position') ?>
  <?= $this->contentElement('help/template_buttons') ?>
</div>
