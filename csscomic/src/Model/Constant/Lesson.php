<?php

namespace App\Model\Constant;

class Lesson
{
  static public function getList(): array
  {
    return [
      'introduction' => __('Introduction to HTML'),
      'spaces' => __('Multiple spaces'),
      'first_tag' => __('First HTML tag: div'),
      'nesting_tags' => __('Nesting tags'),
      'spaces_in_tag' => __('Multiple spaces inside tags'),
      'styling_tags' => __('Basic styling with HTML tags'),
      'back_color' => __('Adding background color'),
      'text_color' => __('Adding text color'),
      'text_colors' => __('Multiple text colors'),
      'single_panel' => __('Single panel'),
      'multiple_panels' => __('Multiple panels'),
      'panels_in_row' => __('Panels side by side'),
      'batman' => __('Introducing Batman'),
      'robin' => __('Introducing Robin'),
      'eyes' => __('Characters eyes'),
      'mouth' => __('Characters mouth'),
      'head' => __('Characters head'),
      'speech_bubbles' => __('Speech bubbles'),
      'position_in_panel' => __('Positions within a panel'),
      'tail_position' => __('Speech bubble tail positions'),
      'speech_text' => __('Speech bubble text styling'),
      'create_comic_0' => __('Create your first css comic'),
      'create_comic_1' => __('Second css comic'),
      'create_comic_2' => __('Third css comic'),
      'create_comic_3' => __('Fourth css comic'),
      'create_comic_4' => __('Fifth css comic'),
      'create_comic_5' => __('Sixth css comic'),
      'create_comic_6' => __('Seventh css comic'),
      'create_comic_7' => __('Eighth css comic'),
      'create_comic_8' => __('Ninth css comic'),
      'create_comic_9' => __('Tenth css comic'),
    ];
  }

  static public function isValidIndex(string $index = null): bool {
    if ($index === null) {
      return false;
    }
    $list = array_keys(self::getList());
    return in_array($index, $list, true);
  }

  static public function getIndex(string $index = null): string {
    $list = array_keys(self::getList());
    if ($index === null) {
      return $list[0];
    }
    if (in_array($index, $list, true)) {
      return $index;
    }
    return $list[0];
  }

  static public function getName(string $index): string {
    $list = self::getList();
    if (array_key_exists($index, $list)) {
      return $list[$index];
    }
    return '(missing)';
  }

  static public function getNextIndex(string $index): ?string {
    $list = array_keys(self::getList());
    $position = array_search($index, $list, true);
    if ($position === false || $position === count($list) - 1) {
      return null;
    }
    return $list[$position + 1];
  }

  static public function getPreviousIndex(string $index): ?string {
    $list = array_keys(self::getList());
    $position = array_search($index, $list, true);
    if ($position === false || $position === 0) {
      return null;
    }
    return $list[$position - 1];
  }

  static public function isCreateComic(string $index): bool {
    return str_starts_with($index, 'create_comic_');
  }

  static public function getLessonCount(): int {
    return count(self::getList()) - self::getCreateComicCount();
  }

  static public function getCreateComicCount(): int {
    $count = 0;
    foreach (array_keys(self::getList()) as $index) {
      if (self::isCreateComic($index)) {
        $count++;
      }
    }
    return $count;
  }
}
