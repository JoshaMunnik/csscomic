<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Background',
  'styles' => [
    'back-yellow',
    'back-blue',
    'back-red',
    'back-green',
    'back-black',
    'back-white',
    'back-gray',
    'back-orange',
    'back-purple',
    'back-pink',
    'back-brown',
  ],
]);
