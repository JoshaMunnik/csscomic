<?php

use App\Model\Enum\ButtonColorEnum;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var string $caption
 * @var string $code Any leading or trailing new lines will be removed.
 */

$buttonId = $this->createDomId();

$codeString = $this->javascriptString($code);
$buttonIdString = $this->javascriptString($buttonId);
$this->Html->scriptBlock(
  'import {lesson} from "'.$this->javascriptBundle().'";'.
  'lesson.registerCodeBlock('.$buttonIdString.', '.$codeString.', null);',
  [
    'block' => 'scriptBottom',
    'type' => 'module',
  ]
);

?>
<?= $this->Styling->smallButton(
  $caption,
  ButtonColorEnum::PRIMARY,
  [
    'id' => $buttonId,
  ],
) ?>
