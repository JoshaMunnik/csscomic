<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$code = '
<div class="panels">
  <div class="panel">
    <div class="batman">
    </div>
  </div>
</div>
';


?>
<div class="cc-lesson-top__start">
  <p>
    Now that we have the panels, we can add the main characters. Let’s start with Batman.
  </p>
  <p>
    To add Batman, use a <code>&lt;div&gt;</code> tag with the style name
    <code>batman</code> and place it inside the <code>&lt;div&gt;</code> that has a
    <code>panel</code> style.
  </p>
  <p>
    <strong>Note:</strong> it is important that the <code>&lt;div&gt;</code> with the style name
    <code>batman</code> always is placed within a <code>&lt;div&gt;</code> with the style name
    <code>panel</code>. Else Batman will not be visible.
  </p>
  <p>
    The <code>&lt;div&gt;</code> with the style name <code>batman</code> never contains content.
    Any change will always be done at the <code>class</code> attribute.
    Although there is no content, it is still important to use a <code>&lt;/div&gt;</code>.
    Else the browser gets confused and the browser will not display the page correctly.
  </p>
  <div class="cc-lesson__exercise-container">
    <p>
      <strong>Exercise:</strong> Add Batman to a panel.
    </p>
  </div>
</div>
<div class="cc-lesson-top__end">
  <?= $this->contentElement('help/panel') ?>
  <?= $this->contentElement('help/character', ['partial' => true]) ?>
  <?= $this->element('code_block', ['code' => $code]) ?>
</div>
