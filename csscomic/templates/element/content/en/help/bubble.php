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
      'pos-tail0',
      'pos-tail1',
      'pos-tail2',
      'pos-tail3',
      'pos-tail5',
      'pos-tail6',
      'pos-tail7',
      'pos-tail8',
      'pos-tail9',
      'pos-tail10',
    ]
  );
}

echo $this->element('styles_list', [
  'title' => 'Bubble',
  'styles' => $styles,
]);
