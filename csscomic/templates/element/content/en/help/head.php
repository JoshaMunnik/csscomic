<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Head',
  'styles' => [
    'blush',
    'scare',
    'shame',
    'rotate-head-left',
    'rotate-head-right',
  ],
]);

