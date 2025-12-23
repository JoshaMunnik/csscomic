<?php

namespace App\Model\Constant;

/**
 * Defines the languages and support methods.
 */
readonly class Language
{
  #region constants

  /**
   * List of supported languages.
   *
   * Each entry exists of 2 elements:
   * 0: Language iso code; used in urls, with the i18n system and as folder name
   * 1: Language name (string) in that language, used in the user interface
   *
   * @var array<int, array{1: string, 2: string}>
   */
  private const LANGUAGES = [
    ['en', 'English'],
    ['nl', 'Nederlands'],
  ];

  /**
   * Field indexes
   */
  private const CODE = 0;
  private const NAME = 1;

  /**
   * The default language code for the website.
   */
  public const DEFAULT_CODE = self::LANGUAGES[0][self::CODE];

  #endregion

  #region public methods

  /**
   * Gets list of all languages.
   *
   * @return string[] The languages (key is language code, value is language name)
   */
  public static function getList(): array
  {
    $result = [];
    foreach (self::LANGUAGES as $language) {
      $result[$language[self::CODE]] = $language[self::NAME];
    }
    return $result;
  }

  /**
   * Returns a regular expression matching all language codes that can be used with the route
   * definitions.
   *
   * @return string
   */
  public static function getRegExp(): string
  {
    $codes = array_map(
      fn($language) => $language[self::CODE],
      self::LANGUAGES,
    );
    return '(?:'.implode('|', $codes).')';
  }

  #endregion
}
