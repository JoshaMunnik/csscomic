<?php

/**
 * @var ApplicationView $this
 * @var bool $partial
 */

use App\View\ApplicationView;

$styles = [
  '&lt;div&gt;',
  '&lt;em&gt;',
  '&lt;strong&gt;',
];
if (!isset($partial)) {
  $styles = array_merge(
    $styles, [
      '&lt;span&gt;',
    ]
  );
}

echo $this->element('styles_list', [
  'title' => 'Tag',
  'styles' => $styles,
]);
