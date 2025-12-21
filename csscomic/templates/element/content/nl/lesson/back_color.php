<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="achter-geel">
  Tekst met een gele achtergrond.
</div>
';

?>
<div class="cc-lesson-top__start">
  <p>
    Met HTML worden de elementen van een webpagina samengesteld. Hoe de elementen er uitzien en
    op welke positie ze staan, gebeurt echter niet met HTML tags maar met <em>styling</em>.
  </p>
  <p>
    De <em>styling</em> bestaat uit een aantal stijl definities die aangeven hoe een bepaald element
    eruit moet zien en/of waar het element geplaatst moet worden. Voor deze lessen zijn er al een
    aantal stijl definities gemaakt waarmee je HTML elementen kan stijlen zodat er een strip
    ontstaat.
  </p>
  <p>
    Om een stijl definitie met een bepaalde <em>naam</em> toe te passen op een HTML tag, moet je de
    <code>class</code> attribuut gebruiken. Het <code>class</code> attribuut wordt toegevoegd
    aan de begintag van een HTML element:
    <code>&lt;<em>tag</em> <strong>class</strong>="<em>naam</em>"&gt;</code>.
  </p>
  <p>
    <strong>Weetje:</strong> een tag kan meerdere attributen bevatten. Bij deze lessen gebruiken we alleen het
    <code>class</code> attribuut.
  </p>
  <p>
    Aan de rechterkant zie je een aantal stijl definitie namen waarmee de achtergrondkleur van een
    element veranderd kan worden.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Pas de achtergrondkleur van een
      <code>&lt;div&gt;</code> aan door het <code>class</code> attribuut te gebruiken met één van de
      stijl definitie namen die je aan de rechterkant ziet.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/background') ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
