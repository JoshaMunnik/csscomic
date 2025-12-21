<?php

/**
 * @var ApplicationView $this
 * @var bool|null $partial
 */

use App\View\ApplicationView;

$styles = [
  'panel',
];

if (!isset($partial)) {
  $styles = array_merge(
    [
      'panels',
      'panels-four',
    ],
    $styles, [
      'panel-two',
      'panel-three',
      'panel-four',
    ]
  );
}

echo $this->element('styles_list', [
  'title' => 'Panels',
  'styles' => $styles,
]);
