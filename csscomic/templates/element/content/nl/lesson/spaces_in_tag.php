<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div>Dit is een test tekst.</div>
<div>
  Dit is een test tekst.
</div>
<div>

  Dit   is
   een   test
     tekst

</div>
';

?>
<div class="cc-lesson-top__start">
  <p>
    Spaties en regelovergangen na de begintag (<code>...&gt;</code>) en het eerste woord van de
    tekst worden genegeerd. Er wordt dus <em>niet</em> één spatie weergegeven.
  </p>
  <p>
    Hetzelfde geldt voor spaties en regelovergangen tussen het laatste woord in de tekst en
    en de eindtag (<code>&lt;...</code>).
  </p>
  <p>
    Het voordeel is dat we vrij zijn de HTML code in te delen zonder dat dit invloed heeft op de
    hoe het in de browser getoond wordt. Dit maakt het mogelijk om structuur aan te brengen zodat
    de code makkelijker te lezen en te begrijpen is.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Oefening:</strong> Voer tags en tekst in met extra spaties en regeleinden.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
