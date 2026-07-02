<?php

/**
 * @var ApplicationView $this
 * @var bool|null $partial
 * @var bool|null $simple
 */

use App\View\ApplicationView;

$styles = [
  'panel',
];

if (isset($simple) && $simple) {
  $styles = [
    'panel',
    'panels',
  ];
}
else if (!isset($partial)) {
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
  'title' => 'Panelen',
  'styles' => $styles,
]);
