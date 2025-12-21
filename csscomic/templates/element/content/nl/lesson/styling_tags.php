<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div>
  Dit is een <strong>sterke tekst</strong>.
  Terwijl dit een <em>benadrukte tekst</em> is.
</div>
<div>
  Dit is zowel een <strong><em>sterke en benadrukte tekst</em></strong>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Soms wil je in een tekst bepaalde woorden of zinnen extra benadrukken. Hiervoor zijn er de
    volgende tags:
  </p>
  <ul>
    <li>
      <code>&lt;strong&gt;</code> om sterke tekst aan te geven. Deze tekst wordt meestal
      <strong>vet</strong> weergegeven.
    </li>
    <li>
      <code>&lt;em&gt;</code> om benadrukte tekst aan te geven. Deze tekst wordt meestal
      <em>schuin</em> weergegeven.
    </li>
  </ul>
  <p>
    Het verschil tussen deze <em>tags</em> en de <code>div-tag</code> is dat
    tekst binnen de <em>tags</em> niet op een nieuwe regel getoond wordt.
  </p>
  <p>
    Je kan ook tekst zowel sterk als benadrukt maken door beide tags te gebruiken. Let er wel op dat
    de tags correct genest zijn.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Voer een tekst in met enkele sterke en benadrukte woorden.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('tag', ['partial' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
