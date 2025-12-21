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
      'pos-staart-0',
      'pos-staart-1',
      'pos-staart-2',
      'pos-staart-3',
      'pos-staart-5',
      'pos-staart-6',
      'pos-staart-7',
      'pos-staart-8',
      'pos-staart-9',
      'pos-staart-10',
    ]
  );
}

echo $this->element('styles_list', [
  'title' => 'Ballon',
  'styles' => $styles,
]);
