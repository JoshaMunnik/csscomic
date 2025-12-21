<?php

/**
 * @var ApplicationView $this
 * @var bool|null $partial
 */

use App\View\ApplicationView;

$styles = [
  'paneel',
];

if (!isset($partial)) {
  $styles = array_merge(
    [
      'panelen',
      'panelen-vier',
    ],
    $styles, [
      'paneel-twee',
      'paneel-drie',
      'paneel-vier',
    ]
  );
}

echo $this->element('styles_list', [
  'title' => 'Panelen',
  'styles' => $styles,
]);
