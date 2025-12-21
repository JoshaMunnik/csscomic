<?php

/**
 * @var ApplicationView $this
 * @var bool|null $partial
 */

use App\View\ApplicationView;

$styles = [
  'bubble',
  'tail-short',
  'tail-tall',
  'tail-right',
  'tail-off-panel',
];
if (!isset($partial)) {
  $styles = array_merge(
    $styles, [
      'pos-tail-0',
      'pos-tail-1',
      'pos-tail-2',
      'pos-tail-3',
      'pos-tail-5',
      'pos-tail-6',
      'pos-tail-7',
      'pos-tail-8',
      'pos-tail-9',
      'pos-tail-10',
    ]
  );
}

echo $this->element('styles_list', [
  'title' => 'Bubble',
  'styles' => $styles,
]);
