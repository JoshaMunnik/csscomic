<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Hoofd',
  'styles' => [
    'bloos',
    'bang',
    'schaam',
    'draai-hoofd-links',
    'draai-hoofd-rechts',
  ],
]);
