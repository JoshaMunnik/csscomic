<?php

use App\Controller\LessonController;
use App\Model\Constant\HtmlAction;
use App\Model\Constant\Lesson;
use App\Tool\UrlTool;
use App\View\ApplicationView;
use Cake\Routing\Router;

/**
 * @var ApplicationView $this
 * @var string $index
 */

$url = Router::Url(UrlTool::url([LessonController::VIEW, 'xx']));
$url = str_replace('xx', '$value$', $url);
?>
<div class="cc-lesson-select__container">
  <?= $this->Form->select(
    'lesson',
    Lesson::getList(),
    [
      'value' => $index,
      HtmlAction::SELECT_URL => $url,
      'class' => 'cc-lesson-select__dropdown'
    ]
  ) ?>
</div>
