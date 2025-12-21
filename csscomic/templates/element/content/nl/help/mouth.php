<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Mond',
  'styles' => [
    'mond-geen',
    'mond-sip',
    'mond-boos',
    'mond-praat',
    'mond-rond',
    'mond-fluister',
    'mond-rechts',
    'mond-links',
    'mond-naar-rechts',
    'mond-naar-links',
  ],
]);
