<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
Een    tekst met    veel spaties
en  regel   overgangen.

Deze regel  komt  na  meerdere regelovergangen.
';


?>
<div class="cc-lesson-top__start">
  <p>
    Hoewel de browser de ingevoerde tekst gewoon laat zien, is er wel een verschil. Als de tekst
    meerdere spaties of regeleinden bevat, dan worden deze in de uitvoer samengevoegd tot één enkele
    spatie. In de uitvoer zal tussen elke woord altijd maar één spatie staan.
  </p>
  <p>
    Bij deze les zie je rechts boven een voorbeeld code staan. Je mag altijd zelf wat invoeren of
    je kan de <code>kopiëren</code> button gebruiken om de voorbeeld code in de editor te plaatsen.
  </p>
  <p>
    <strong>Let op:</strong> Als je de <code>kopiëren</code> button gebruikt, zal de bestaande code
    in de editor overschreven worden.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Voer wat tekst in met extra spaties en regeleinden. Druk daarna op
      de <code>update</code> button om te zien wat er gebeurt.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
