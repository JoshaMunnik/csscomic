<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
  <div class="panel">
  </div>
</div>
';

?>
<div class="cc-lesson-top__start">
  <p>
    Als je een HTML tag stijlt, dan kan je stijling alleen toepassen op de tag zelf en de content
    van de tag. Daarom was het niet mogelijk in de vorige les om meerdere panelen naast elkaar
    te krijgen.
  </p>
  <p>
    Om meerdere panelen op een rij te krijgen, moeten ze allen in een <code>&lt;div&gt;</code>
    geplaatst worden.<br/> Deze <code>&lt;div&gt;</code> krijgt de stijl naam <code>panels</code>.
    Deze stijl zorgt ervoor dat de panelen naast elkaar komen te staan.
  </p>
  <p>
    <strong>Let op:</strong> Het is belangrijk dat alle <code>&lt;div&gt;</code> tags met
    de stijl naam <code>panel</code> binnen de <code>&lt;div&gt;</code> met de stijl naam
    <code>panels</code> staan.
  </p>
  <p>
    Om meerdere rijen te krijgen kan je gewoon meer <code>&lt;div&gt;</code> met de stijl
    naam <code>panel</code> toevoegen. De <code>panels</code> stijl zorgt er voor dat deze
    automatisch naar de volgende rij verplaatst worden als er geen ruimte meer is.
  </p>
  <p>
    <strong>Let op:</strong> zorg er voor dat elke paneel zijn eigen <code>&lt;div&gt;</code>
    gebruikt met een begintag en een eindtag.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening: </strong>Maak twee rijen met elk drie panelen.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel', ['simple' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
