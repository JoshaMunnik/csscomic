<?php

namespace App\Model\Entity;

use App\Lib\Model\Entity\IEntityWithId;
use App\Lib\Model\Entity\IEntityWithTimestamp;
use App\Model\Constant\Lesson;
use Cake\ORM\Entity;

/**
 * {@link LessonEntity} encapsulates a lesson in the database.
 *
 * @property string $user_id
 * @property string $lesson_index
 * @property string $lesson_text
 */
class LessonEntity extends Entity implements IEntityWithId, IEntityWithTimestamp
{
  #region field constants

  public const USER_ID = 'user_id';
  public const LESSON_INDEX = 'lesson_index';
  public const LESSON_TEXT = 'lesson_text';

  #endregion

  #region support methods

  /**
   * @param LessonEntity[] $lessons
   *
   * @return int
   */
  static function getLessonCount(array $lessons): int {
    $count = 0;
    foreach($lessons as $lesson) {
      if (!empty($lesson->lesson_text) && !Lesson::isCreateComic($lesson->lesson_index)) {
        $count++;
      }
    }
    return $count;
  }

  /**
   * @param LessonEntity[] $lessons
   *
   * @return int
   */
  static function getComicCount(array $lessons): int {
    $count = 0;
    foreach($lessons as $lesson) {
      if (!empty($lesson->lesson_text) && Lesson::isCreateComic($lesson->lesson_index)) {
        $count++;
      }
    }
    return $count;
  }

  #endregion
}
