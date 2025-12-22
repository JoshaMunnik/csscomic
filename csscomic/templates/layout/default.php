<?php
/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

$title = 'CSS Comic';
?>
<!DOCTYPE html>
<html lang="<?= $this->language() ?>">
  <head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?= $title ?> |
      <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'site']) ?>
    <?= $this->Html->script(['uf-html-helpers']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  </head>
  <body>
    <noscript>
      <div class="cc-main__no-script">
        <?= __('This site requires Javascript to function; please enable it for this domain.') ?>
      </div>
    </noscript>
    <header class="cc-header__container">
      <div class="cc-header__start">
          <?= $this->element('logo') ?>
      </div>
      <div class="cc-header__end">
        <?= $this->element('user') ?>
        <?= $this->element('language_select') ?>
      </div>
    </header>
    <main class="cc-main__container">
        <?= $this->element('messages') ?>
        <?= $this->fetch('content') ?>
    </main>
    <?= $this->element('footer') ?>
    <?= $this->fetch('scriptBottom') ?>
  </body>
</html>
