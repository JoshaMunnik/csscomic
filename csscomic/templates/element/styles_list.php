<?php

use App\View\ApplicationView;

/**
 * Renders a information box listing various help.
 *
 * @var ApplicationView $this
 * @var string[] $styles
 * @var string $title
 */

?>
<div class="cc-lesson-styles-list__container">
  <h3 class="cc-lesson-styles-list__title">
    <?= $title ?>
  </h3>
  <ul class="cc-lesson-styles-list__list">
    <?php foreach ($styles as $style) : ?>
      <li class="cc-lesson-styles-list__item"><?= $style ?></li>
    <?php endforeach; ?>
  </ul>
</div>
