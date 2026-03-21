<?php
declare(strict_types=1);

namespace App\View\Helper\Styling;

use App\Model\Enum\CellDataTypeEnum;
use App\Model\Enum\CellStylingEnum;
use App\Model\Enum\ContentPositionEnum;
use Cake\View\Helper;
use Cake\View\Helper\HtmlHelper;
use DateTimeInterface;

/**
 * @property HtmlHelper $Html
 */
class TableHelper extends Helper
{
  protected array $helpers = ['Html'];

  public function beginSortedTable(?string $storageId, bool $fullWidth = false): string
  {
    $html = '<table class="cc-table__container'.($fullWidth ? ' cc-table__container--is-full-width' : '').'"'.
      ' data-uf-sorting'.
      ' data-uf-sort-ascending="cc-table__cell--is-ascending"'.
      ' data-uf-sort-descending="cc-table__cell--is-descending"';
    if ($storageId) {
      $html .= ' data-uf-storage-id="'.$storageId.'"';
    }
    $html .= '>';
    return $html;
  }

  public function endSortedTable(): string
  {
    return '</table>';
  }

  public function sortedTableHeader(array $columns): string
  {
    $html = '<tr class="cc-table__row cc-table__row--is-header" data-uf-header-row>';
    foreach ($columns as $value) {
      if ($value == null) {
        $html .= '<th class="cc-table__cell cc-table__cell--is-header cc-table__cell--is-tight">&nbsp;</th>';
      }
      else {
        if (!is_array($value)) {
          $value = [$value];
        }
        $sortType = $this->getCellSortType($value);
        $classes = $this->getCellStylingClasses($value);
        $text = $this->getCellText($value);
        $html .= '<th class="cc-table__cell cc-table__cell--is-header '.$classes.'" '.$sortType.'>';
        $html .= '<button class="cc-button__table-header">'.$text.'</button>';
        $html .= '</th>';
      }
    }
    $html .= '</tr>';
    return $html;
  }

  public function sortedTableRow(
    array $columns,
    array $buttons = [],
    bool $isActive = false
  ): string {
    $activeRow = $isActive ? ' cc-table__row--is-active' : '';
    $html = '<tr class="cc-table__row cc-table__row--is-data'.$activeRow.'">';
    foreach ($columns as $value) {
      if (!is_array($value)) {
        $value = [$value];
      }
      $position = $this->getCellPosition($value);
      $cssClasses = 'cc-table__cell cc-table__cell--is-data'.$this->getCellStylingClasses($value);
      $attributes = $this->getAttributes($value);
      $cellValue = $this->getCellValue($value);
      $cellText = $this->getCellText($value);
      if ($cellValue instanceof DateTimeInterface) {
        $cssClasses .= ' cc-table__cell--is-date';
        $cellText = str_replace(' ', '&nbsp;', $cellText);
      }
      if ($isActive) {
        $cssClasses .= ' cc-table__cell--is-active';
      }
      $cssClasses .= match ($position) {
        ContentPositionEnum::CENTER => ' cc-table__cell--at-center',
        ContentPositionEnum::END => ' cc-table__cell--at-right',
        default => '',
      };
      $attributes = ' '.$this->Html->templater()->formatAttributes($attributes);
      $html .= '<td class="'.$cssClasses.'"'.$attributes.'>'.$cellText.'</td>';
    }
    if (!empty($buttons)) {
      $html .= '<td class="cc-table__cell cc-table__cell--is-data">';
      $html .= '<div class="cc-layout__buttons">';
      foreach ($buttons as $button) {
        $html .= $button;
      }
      $html .= '</div>';
      $html .= '</td>';
    }
    $html .= '</tr>';
    return $html;
  }

  private function getCellSortType(array $cellValues): string
  {
    foreach ($cellValues as $cellValue) {
      if ($cellValue instanceof CellDataTypeEnum) {
        return match ($cellValue) {
          CellDataTypeEnum::DATE => ' data-uf-sort-type="date"',
          CellDataTypeEnum::NUMBER => ' data-uf-sort-type="number"',
          default => ' data-uf-sort-type="text"',
        };
      }
    }
    return '';
  }

  private function getCellStylingClasses(array $cellValues): string
  {
    $result = '';
    foreach ($cellValues as $cellValue) {
      if ($cellValue instanceof CellStylingEnum) {
        $result .= match ($cellValue) {
          CellStylingEnum::TIGHT => ' cc-table__cell--is-tight',
          CellStylingEnum::DATE => ' cc-table__cell--is-date',
          CellStylingEnum::HIDE_ON_MOBILE => ' cc--hide-on-mobile',
          default => '',
        };
      }
    }
    return $result;
  }

  private function getCellText(array $values): string
  {
    foreach ($values as $value) {
      if ($value instanceof CellDataTypeEnum) {
        continue;
      }
      if ($value instanceof CellStylingEnum) {
        continue;
      }
      if ($value instanceof ContentPositionEnum) {
        continue;
      }
      if ($value instanceof DateTimeInterface) {
        return $value->format('Y-m-d H:i');
      }
      return $value.'';
    }
    return '';
  }

  private function getCellValue(array $values): mixed
  {
    foreach ($values as $value) {
      if ($value instanceof CellDataTypeEnum) {
        continue;
      }
      if ($value instanceof CellStylingEnum) {
        continue;
      }
      if ($value instanceof ContentPositionEnum) {
        continue;
      }
      return $value;
    }
    return null;
  }

  private function getCellPosition(array $values): ContentPositionEnum
  {
    foreach ($values as $value) {
      if ($value instanceof ContentPositionEnum) {
        return $value;
      }
    }
    return ContentPositionEnum::START;
  }

  private function getAttributes(array $values): array
  {
    return array_filter($values, function ($key) {
      return is_string($key);
    }, ARRAY_FILTER_USE_KEY);
  }
}



