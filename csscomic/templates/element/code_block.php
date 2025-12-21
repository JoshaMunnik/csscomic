<?php

use App\Model\Enum\ButtonColorEnum;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var string $code Any leading or trailing new lines will be removed.
 */

$buttonId = $this->createDomId();
$contentId = $this->createDomId();

$codeString = $this->javascriptString($code);
$buttonIdString = $this->javascriptString($buttonId);
$contentIdString = $this->javascriptString($contentId);
$this->Html->scriptBlock(
  'import {lesson} from "'.$this->javascriptBundle().'";'.
  'lesson.registerCodeBlock('.$buttonIdString.', '.$codeString.', '.$contentIdString.');',
  [
    'block' => 'scriptBottom',
    'type' => 'module',
  ]
);

?>
<div class="cc-lesson-code-block__container">
  <?= $this->Styling->smallButton(
    __('Copy'),
    ButtonColorEnum::PRIMARY,
    [
      'id' => $buttonId,
      'class' => 'cc-lesson-code-block__copy-button',
    ],
  ) ?>
  <div class="cc-lesson-code-block__content" id="<?= $contentId ?>"></div>
</div>
