<?php

namespace App\Model\Table;

use App\Lib\Model\Table\TableWithTimestamp;
use App\Model\Entity\LessonEntity;
use App\Model\Entity\UserEntity;

/**
 * This table encapsulates the lesson texts saved for authenticated users.
 */
class LessonsTable extends TableWithTimestamp
{
  #region cakephp callbacks

  /**
   * @inheritDoc
   */
  public function initialize(array $config): void
  {
    parent::initialize($config);
    $this->setEntityClass(LessonEntity::class);
  }

  /**
   * Either create a new or update an existing lesson entry for a user with new text.
   *
   * @param UserEntity $user
   * @param string $lessonIndex
   * @param string $lessonText
   *
   * @return bool
   */
  public function saveText(UserEntity $user, string $lessonIndex, string $lessonText): bool
  {
    $lesson = $this->find()
      ->where([
        LessonEntity::USER_ID => $user->id,
        LessonEntity::LESSON_INDEX => $lessonIndex,
      ])
      ->first();
    // update existing or create new
    if ($lesson) {
      $lesson->lesson_text = $lessonText;
    }
    else {
      $lesson = $this->newEntity([
        LessonEntity::USER_ID => $user->id,
        LessonEntity::LESSON_INDEX => $lessonIndex,
        LessonEntity::LESSON_TEXT => $lessonText,
      ]);
    }
    return $this->save($lesson) !== false;
  }

  /**
   * Retrieve the lesson text for a given user and lesson index.
   *
   * @param UserEntity $user
   * @param string $lessonIndex
   *
   * @return string Stored lesson text or empty string if not found
   */
  public function getText(UserEntity $user, string $lessonIndex): string
  {
    $lesson = $this->find()
      ->where([
        LessonEntity::USER_ID => $user->id,
        LessonEntity::LESSON_INDEX => $lessonIndex,
      ])
      ->first();
    if ($lesson) {
      return $lesson->lesson_text;
    }
    return '';
  }

  #endregion
}
