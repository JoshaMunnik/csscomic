<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Eyes',
  'styles' => [
    'eyes-none',
    'eyes-think',
    'eyes-doubt',
    'eyes-sad',
    'eyes-angry',
    'eyes-suspicious',
    'eyes-surprise',
    'eyes-shock',
  ],
]);
