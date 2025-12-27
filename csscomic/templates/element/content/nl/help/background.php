<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Achtergrond',
  'styles' => [
    'achter-geel',
    'achter-blauw',
    'achter-rood',
    'achter-groen',
    'achter-zwart',
    'achter-wit',
    'achter-grijs',
    'achter-oranje',
    'achter-paars',
    'achter-roze',
    'achter-bruin',
  ],
]);
