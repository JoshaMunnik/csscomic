<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="achter-geel tekst-groen">
  Groene tekst met gele achtergrond
</div>
';

?>
<div class="cc-lesson-top__start">
  <p>
    Het is mogelijk om meerdere stijl definities toe te passen op een HTML element. Dit doe je door
    meerdere namen in het <code>class</code> attribuut te gebruiken, gescheiden door een spatie.
  </p>
  <p>
    Aan de rechterkant zie je een aantal nieuwe stijl definitie namen waarmee je de tekstkleur kan
    aanpassen.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Pas zowel de tekst als achtergrond kleur aan van de tekst binnen
      een <code>&lt;div&gt;</code>.
    </p>
    <p>
      <strong>Oefening:</strong> Probeer verschillende kleur combinaties om te zien welke teksten
      wel goed leesbaar zijn en welke niet (bijvoorbeeld een rode tekst met een groene achtergrond).
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/text') ?>
  <?= $this->contentElement('help/background') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
