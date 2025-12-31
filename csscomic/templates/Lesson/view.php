<?php

/**
 * @var ApplicationView $this
 * @var string $index
 * @var string $code
 */

use App\Controller\LessonController;
use App\Model\Constant\Lesson;
use App\Model\Enum\ButtonColorEnum;
use App\View\ApplicationView;

$downloadUrl = $this->Url->build($this->url(LessonController::DOWNLOAD));
$saveUrl = $this->isLoggedIn() ? $this->Url->build($this->url(LessonController::SAVE)) : false;

$language = $this->language();
$template = '
<!doctype html>
<html lang="'.$language.'">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lesson Output</title>
    '.$this->Html->css(['normalize.min', $language.'/batman-comic', $language.'/comic']).'
  </head>
  <body>
    $body$
  </body>
</html>
';

$templateString = $this->javascriptString($template);
$indexString = $this->javascriptString($index);
$downloadUrlString = $this->javascriptString($downloadUrl);
$saveUrlString = $this->javascriptString($saveUrl);
$codeString = $this->javascriptString($code);
$csrfTokenString = $this->javascriptString($this->getRequest()->getAttribute('csrfToken'));
$this->Html->scriptBlock(
  'import {lesson} from "'.$this->javascriptBundle().'";'.
  'lesson.init('
  .$indexString.', '
  .$templateString.', '
  .$downloadUrlString.', '
  .$saveUrlString.', '
  .$codeString.', '
  .$csrfTokenString
  .');',
  [
    'block' => 'scriptBottom',
    'type' => 'module',
  ]
);

$this->assign('title', Lesson::getName($index));

?>
<div class="cc-lesson-page">
  <div class="cc-lesson-page__loading" id="loading-indicator">
    <?= __('Loading...') ?>
  </div>
  <div class="cc-lesson-header__container">
    <div class="cc-lesson-header__start">
      <?= $this->element('lesson_select', ['index' => $index]) ?>
    </div>
    <div class="cc-lesson-header__end">
      <?= $this->element('lesson_navigation', ['index' => $index]) ?>
    </div>
  </div>
  <div class="cc-lesson-top__container">
    <?= $this->contentElement('lesson/'.$index) ?>
  </div>
  <div class="cc-lesson-bottom__container">
    <div class="cc-lesson-input">
      <div class="cc-lesson-action__container">
        <div class="cc-lesson-action__right">
          <?= $this->Styling->smallButton(
            '<strong>[F9]</strong>&nbsp;'.__('update'),
            ButtonColorEnum::PRIMARY,
            ['id' => 'update-output-button']
          ) ?>
        </div>
      </div>
      <div id="editor-container" class="cc-lesson-editor__container"></div>
      <div id="lint-container"></div>
    </div>
    <div class="cc-lesson-output" id="output-section">
      <div class="cc-lesson-action__container">
        <div class="cc-lesson-action__left">
          <div class="cc-icon__magnify"></div>
          <div class="cc-lesson-scale__container">
            <input
              id="scale-slider"
              class="cc-lesson-scale__slider"
              type="range"
              min="25"
              max="800"
              value="100"
            />
            <div id="scale-value" class="cc-lesson-scale__value">
              100%
            </div>
          </div>
          <div class="cc-lesson-action__button-spacer"></div>
          <?= $this->Styling->smallButton(
            '100%',
            ButtonColorEnum::PRIMARY,
            ['id' => 'no-scaling-button']
          ) ?>
          <?= $this->Styling->smallButton(
            __('full width'),
            ButtonColorEnum::PRIMARY,
            ['id' => 'full-width-button']
          ) ?>
          <?= $this->Styling->smallButton(
            __('everything'),
            ButtonColorEnum::PRIMARY,
            ['id' => 'everything-button']
          ) ?>
        </div>
        <div class="cc-lesson-action__right">
          <?= $this->Styling->smallButton(
            __('download'),
            ButtonColorEnum::PRIMARY,
            [
              'id' => 'download-button',
              'disabled' => 'disabled',
            ]
          ) ?>
          <?= $this->Styling->smallButton(
            __('full page'),
            ButtonColorEnum::PRIMARY,
            ['id' => 'show-full-page-button']
          ) ?>
          <?= $this->Styling->smallButton(
            '<strong>[ESC]</strong>&nbsp;'.__('exit full page'),
            ButtonColorEnum::PRIMARY,
            [
              'id' => 'exit-full-page-button',
              'class' => 'cc-lesson-action__button--is-hidden',
            ]
          ) ?>
        </div>
      </div>
      <div class="cc-lesson-output__outer-container" id="output-outer-container">
        <div class="cc-lesson-output__inner-container" id="output-inner-container">
          <iframe class="cc-lesson-output__frame" id="output-frame">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->element('translations') ?>

