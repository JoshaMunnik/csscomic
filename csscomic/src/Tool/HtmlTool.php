<?php

namespace App\Tool;

use DOMDocument;
use DOMElement;
use DOMException;
use DOMXPath;

readonly class HtmlTool
{
  #region public methods

  /**
   * @throws DOMException
   */
  public static function inlineStylesheetLinks(
    string $html,
    bool $allowRemote = true
  ): string {
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $htmlDir = rtrim(WWW_ROOT, DS);
    $dom->loadHTML('<?xml encoding="utf-8" ?>'.$html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xpath = new DOMXPath($dom);
    self::replaceStyleLinks($xpath, $dom, $htmlDir, $allowRemote);
    self::addBodyStyling($xpath, $dom);
    self::removeScripts($xpath);
    $out = $dom->saveHTML();
    // remove XML encoding hack
    return preg_replace('/<\?xml.*?\?>\s*/', '', $out);
  }

  #endregion

  #region private methods

  /**
   * @throws DOMException
   */
  private static function replaceStyleLinks(
    DOMXPath $xpath,
    DOMDocument $dom,
    string $htmlDir,
    bool $allowRemote
  ): void {
    $links = $xpath->query("//link[translate(@rel,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='stylesheet' and @href]");
    foreach ($links as $link) {
      /** @var DOMElement $link */
      $href = $link->getAttribute('href');
      $href = preg_replace('/\?.*$/', '', $href);
      // resolve CSS source (either remote URL or local file)
      $isRemote = (bool) parse_url($href, PHP_URL_SCHEME);
      if ($isRemote) {
        if (!$allowRemote) {
          // skip remote if not allowed
          continue;
        }
        // remote URL: use as-is
        $cssUrl = $href;
        // fetch remote CSS (basic)
        $cssContent = @file_get_contents($cssUrl);
        if ($cssContent === false) {
          // skip if cannot fetch
          continue;
        }
        $cssBaseForUrls = rtrim(dirname($cssUrl), '/').'/';
      }
      else {
        $candidate = realpath($htmlDir.DIRECTORY_SEPARATOR.ltrim($href, '/\\'));
        if ($candidate && is_readable($candidate)) {
          $cssContent = file_get_contents($candidate);
          // use file:// base so resources referenced, remain resolvable
          $cssBaseForUrls = 'file://'.str_replace('\\', '/', dirname($candidate)).'/';
        }
        else {
          // try href as a direct filesystem path
          $candidate2 = realpath($href);
          if ($candidate2 && is_readable($candidate2)) {
            $cssContent = file_get_contents($candidate2);
            $cssBaseForUrls = 'file://'.str_replace('\\', '/', dirname($candidate2)).'/';
          }
          else {
            // couldn't resolve -> skip replacement
            continue;
          }
        }
      }

      // Rewrite relative url(...) inside CSS to absolute versions using $cssBaseForUrls
      if ($cssBaseForUrls !== '') {
        $cssContent = preg_replace_callback(
          '/url\(\s*(["\']?)(?!data:|https?:|file:|\/)([^"\')]+)\1\s*\)/i',
          function ($m) use ($cssBaseForUrls) {
            $rel = $m[2];
            // Normalize base and join
            $abs = rtrim($cssBaseForUrls, '/').'/'.ltrim($rel, './');
            // If file:// base, keep file://, else keep as URL
            return 'url("'.$abs.'")';
          },
          $cssContent
        );
      }

      // Create <style> element and copy media attribute if present
      $style = $dom->createElement('style');
      if ($link->hasAttribute('media')) {
        $style->setAttribute('media', $link->getAttribute('media'));
      }
      // Use a text node to avoid markup parsing inside CSS
      $style->appendChild($dom->createTextNode("\n".$cssContent."\n"));

      // Replace link with style
      $link->parentNode->replaceChild($style, $link);
    }
  }

  /**
   * @throws DOMException
   */
  private static function addBodyStyling(DOMXPath $xpath, DOMDocument $dom): void
  {
    $head = $xpath->query("//head");
    $style = $dom->createElement('style');
    $style->appendChild($dom->createTextNode("\nbody { margin: 2rem; padding: 0; }\n:root { --size: 0.75vmin; }\n"));
    if ($head->length > 0) {
      $head->item(0)->appendChild($style);
    }
  }

  private static function removeScripts(DOMXPath $xpath): void
  {
    foreach ($xpath->query('//script') as $script) {
      $script->parentNode->removeChild($script);
    }
  }

  #endregion
}
