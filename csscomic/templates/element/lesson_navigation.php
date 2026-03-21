<?php

/**
 * @var ApplicationView $this
 * @var string $index
 */

use App\Controller\LessonController;
use App\Model\Constant\Lesson;
use App\View\ApplicationView;

$nextIndex = Lesson::getNextIndex($index);
$previousIndex = Lesson::getPreviousIndex($index);
?>
<?php if ($previousIndex !== null): ?>
  <?= $this->Styling->Button->link(
    Lesson::isCreateComic($previousIndex) ? __('Previous comic') :  __('Previous lesson'),
    [LessonController::VIEW, $previousIndex]
  ) ?>
<?php endif; ?>
<?php if ($nextIndex != null): ?>
  <?= $this->Styling->Button->link(
    Lesson::isCreateComic($nextIndex) ? __('Next comic') : __('Next lesson'),
    [LessonController::VIEW, $nextIndex]
  ) ?>
<?php endif; ?>
