<?php

/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

echo $this->element('styles_list', [
  'title' => 'Mouth',
  'styles' => [
    'mouth-none',
    'mouth-sad',
    'mouth-angry',
    'mouth-talk',
    'mouth-round',
    'mouth-whisper',
    'mouth-right',
    'mouth-left',
    'mouth-to-right',
    'mouth-to-left',
  ],
]);
