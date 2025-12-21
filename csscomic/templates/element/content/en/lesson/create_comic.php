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
      Create your first comic!
    </p>
    <p>
      On the far right there are some buttons you can click to insert a panel layout into the code
      editor.
    </p>
    <p>
      You can also see all the tags and styles we covered in the previous lessons.
    </p>
    <p>
      If you finish a comic and want to make another, choose the next lesson. You can create up to
      10 different comics.
    </p>
  <?php else : ?>
    <p>
      Create a new comic.
    </p>
  <?php endif; ?></div>
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
