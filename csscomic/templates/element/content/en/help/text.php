<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Text',
  'styles' => [
    'text-yellow',
    'text-blue',
    'text-red',
    'text-green',
    'text-black',
    'text-white',
    'text-gray',
    'text-orange',
    'text-purple',
    'text-pink',
    'text-brown',
  ],
]);
