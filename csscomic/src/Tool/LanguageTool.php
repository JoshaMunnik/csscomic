<?php

namespace App\Tool;

use App\Model\Constant\Language;
use Cake\I18n\I18n;
use Closure;

/**
 * {@link LanguageTool} provides language related utility functions.
 */
class LanguageTool
{
  /**
   * Runs the given closure for the specified language.
   *
   * @param string $languageCode
   * @param Closure $closure
   *
   * @return void
   */
  public static function runForLanguage(string $languageCode, Closure $closure): void {
    $currentLocale = I18n::getLocale();
    I18n::setLocale($languageCode);
    try {
      $closure();
    } finally {
      I18n::setLocale($currentLocale);
    }
  }
}
