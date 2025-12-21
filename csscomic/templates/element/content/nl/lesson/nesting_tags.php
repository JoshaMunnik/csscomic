<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div>
  Tekst binnen een div tag.
  <div>
    Geneste text.
    <div>
      En nog meer nesting.
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Naast een tekst kan een <em>tag</em> ook weer andere <em>tags</em> bevatten. Dit wordt
    <em>geneste tags</em> genoemd.
  </p>
  <p>
    Je kan een tag zien als een soort doos. In de doos kan je tekst stoppen maar ook andere dozen.
    In die dozen kan je ook weer tekst en dozen stoppen. En zo verder.
  </p>
  <p>
    <strong>Let op:</strong> Het is belangrijk dat elke begintag een bijbehorende eindtag heeft!
    Anders weet de browser niet waar een tag begint en eindigt en hoe de browser de pagina moet
    weergeven.
  </p>
  <p>
    Mocht je een fout maken in de html code, dan zal de editor je hierop wijzen. Bij het invoeren
    zal er een <img src="/img/error-dot.png" alt="rooie stip"/> verschijnen bij één van de
    regelnummers. Als je hierover heen gaat met je muis krijg je een melding te zien van wat de
    fout is. Ook zullen er onder de editor foutmeldingen verschijnen als je de <code>update</code>
    button gebruikt met HTML code die fouten bevat.
  </p>
  <p>
    <strong>Let op:</strong> HTML code die fouten bevat wordt <em>niet</em> weergegeven in het
    uitvoer gedeelte.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Voer enkele geneste <code>div-tags</code> in de code editor in.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
