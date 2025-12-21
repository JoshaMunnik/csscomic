<?php

/**
 * @var ApplicationView $this
 * @var bool $partial
 */

$styles = [
  'batman',
];
if (!isset($partial)) {
  $styles[] = 'robin';
}

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Karakter',
  'styles' => $styles,
]);
