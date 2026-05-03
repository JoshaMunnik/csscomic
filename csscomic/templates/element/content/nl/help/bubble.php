<?php

/**
 * @var ApplicationView $this
 * @var bool|null $partial
 */

use App\View\ApplicationView;

$styles = [
  'ballon',
  'staart-kort',
  'staart-lang',
  'staart-rechts',
  'staart-buiten',
];
if (!isset($partial)) {
  $styles = array_merge(
    $styles, [
      'pos-staart0',
      'pos-staart1',
      'pos-staart2',
      'pos-staart3',
      'pos-staart5',
      'pos-staart6',
      'pos-staart7',
      'pos-staart8',
      'pos-staart9',
      'pos-staart10',
    ]
  );
}

echo $this->element('styles_list', [
  'title' => 'Ballon',
  'styles' => $styles,
]);
