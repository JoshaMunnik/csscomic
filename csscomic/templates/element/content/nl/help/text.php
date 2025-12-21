<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Tekst',
  'styles' => [
    'tekst-geel',
    'tekst-blauw',
    'tekst-rood',
    'tekst-groen',
    'tekst-zwart',
    'tekst-wit',
    'tekst-grijs',
    'tekst-oranje',
    'tekst-paars',
    'tekst-roze',
  ],
]);
