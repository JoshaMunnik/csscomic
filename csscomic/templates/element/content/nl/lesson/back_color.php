<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="back-yellow">
  Tekst met een gele achtergrond.
</div>
';

?>
<div class="cc-lesson-top__start">
  <p>
    Een webpagina bestaat uit een aantal HTML tags. Hoe deze HTML tags er uitzien (bijvoorbeeld
    kleur of tekst grootte) en op welke positie ze staan (bijvoorbeeld bovenaan of onderaan),
    gebeurt met <em>styling</em>.
  </p>
  <p>
    De <em>styling</em> bestaat uit een aantal stijl definities. Elke website heeft zijn eigen
    stijl definities. Deze website heeft stijl definities om een strip te maken. De stijl definities
    staan meestal in een eigen <em>css</em> (Cascading Style Sheets) bestand.
  </p>
  <p>
    Om een stijl definitie met een bepaalde <em>naam</em> toe te passen op een HTML tag, moet je de
    <code>class</code> attribuut gebruiken. Het <code>class</code> attribuut wordt toegevoegd
    aan de begintag van een HTML tag:
    <code>&lt;<em>...</em> <strong>class</strong>="<em>naam</em>"&gt;</code>.
  </p>
  <p>
    <strong>Weetje:</strong> een tag kan meerdere attributen bevatten. Bij deze lessen gebruiken
    we alleen het <code>class</code> attribuut.
  </p>
  <p>
    Aan de rechterkant zie je een aantal stijl definitie namen waarmee de achtergrondkleur van de
    content van een tag veranderd kan worden.
  </p>
  <p>
    Bij de volgende les leer je hoe je de kleur van de tekst kan aanpassen.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Pas de achtergrondkleur van een
      <code>&lt;div&gt;</code> aan door het <code>class</code> attribuut te gebruiken met één van de
      achtergrond stijl definitie namen.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/background') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
