<?php
declare(strict_types=1);

namespace App\View\Helper\Styling;

use App\Model\Enum\GapEnum;
use Cake\View\Helper;

class LayoutHelper extends Helper
{
  /** @var string Generated tab group id for tabs */
  private string $m_tabId = '';

  public function beginRow(GapEnum $gap = GapEnum::SMALL): string
  {
    $gapClass = match ($gap) {
      default => '',
      GapEnum::SMALL => ' cc-layout__row--has-small-gap',
      GapEnum::FORM => ' cc-layout__row--has-form-gap',
      GapEnum::DIALOG => ' cc-layout__row--has-dialog-gap',
    };
    return '<div class="cc-layout__row'.$gapClass.'">';
  }

  public function endRow(): string
  {
    return '</div>';
  }

  public function beginColumn(GapEnum $gap = GapEnum::SMALL): string
  {
    $gapClass = match ($gap) {
      default => '',
      GapEnum::SMALL => ' cc-layout__column--has-small-gap',
      GapEnum::FORM => ' cc-layout__column--has-form-gap',
      GapEnum::DIALOG => ' cc-layout__column--has-dialog-gap',
    };
    return '<div class="cc-layout__column'.$gapClass.'">';
  }

  public function endColumn(): string
  {
    return '</div>';
  }

  public function beginButtons(): string
  {
    return '<div class="cc-layout__buttons">';
  }

  public function endButtons(): string
  {
    return '</div>';
  }

  public function beginPageButtons(): string
  {
    return '<nav class="cc-layout__buttons cc-layout__buttons--wrap">';
  }

  public function endPageButtons(): string
  {
    return '</nav>';
  }

  public function beginTabsContainer(): string
  {
    $this->m_tabId = uniqid('cc-tabs__container-');
    return '<div class="cc-tabs__container">';
  }

  public function endTabsContainer(): string
  {
    return '</div>';
  }

  public function beginTab(string $title, bool $selected = false): string
  {
    $id = uniqid('cc-tabs__tab-');
    $html = '<input type="radio" id="'.$id.'" name="'.$this->m_tabId.'" class="cc-tabs__tab-radio" '
      .($selected ? ' checked' : '').' />';
    $html .= '<label class="cc-tabs__title" for="'.$id.'">'.$title.'</label>';
    $html .= '<div class="cc-tabs__content">';
    return $html;
  }

  public function endTab(): string
  {
    return '</div>';
  }
}

