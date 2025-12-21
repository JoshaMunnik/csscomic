<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Ogen',
  'styles' => [
    'ogen-geen',
    'ogen-denk',
    'ogen-twijfel',
    'ogen-sip',
    'ogen-boos',
    'ogen-verdacht',
    'ogen-verrast',
    'ogen-geschokt',
  ],
]);
