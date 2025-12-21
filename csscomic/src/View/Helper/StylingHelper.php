<?php

namespace App\View\Helper;

use App\Lib\Model\Base\ModelBase;
use App\Model\Enum\ButtonColorEnum;
use App\Model\Enum\ButtonIconEnum;
use App\Model\Enum\CellDataTypeEnum;
use App\Model\Enum\CellStylingEnum;
use App\Model\Enum\ContentPositionEnum;
use App\Model\Enum\GapEnum;
use App\Tool\UrlTool;
use Cake\View\Helper;
use Cake\View\Helper\FormHelper;
use Cake\View\Helper\HtmlHelper;
use DateTimeInterface;

/**
 * Styling helper can be used to create styled HTML elements.
 *
 * @property HtmlHelper $Html
 * @property FormHelper $Form
 */
class StylingHelper extends Helper
{
  #region configuration

  protected array $helpers = ['Html', 'Form'];

  #endregion

  #region private variables

  private string $m_tabId = '';

  #endregion

  #region public methods

  /**
   * @param string $title
   * @param string|array $url
   * @param ButtonColorEnum $color
   * @param bool $hideOnMobile
   * @return string
   */
  public function linkButton(
    string $title,
    string|array $url,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->link(
      $title,
      UrlTool::Url($url),
      [
        'class' => 'cc-button__normal '
          .$this->getButtonColorClass($color)
          .$this->getHideOnMobileCssClass($hideOnMobile),
        'escape' => false,
      ]
    );
  }

  /**
   * @param string $title
   * @param string|array $url
   * @return string
   */
  public function linkText(string $title, string|array $url): string
  {
    return $this->Html->link(
      $title,
      UrlTool::Url($url),
      [
        'class' => 'cc-button__link',
        'escape' => false,
      ]
    );
  }

  /**
   * @param string $title
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function button(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'button',
      $title,
      $this->mergeAttributes(
        [
          'class' => 'cc-button__normal '
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'type' => 'button',
          'escape' => false,
        ],
        $attributes
      )
    );
  }

  /**
   * @param ButtonIconEnum $icon
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function iconButton(
    ButtonIconEnum $icon,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'button',
      $this->getButtonIconHtml($icon),
      $this->mergeAttributes(
        [
          'class' => 'cc-button__normal cc-button__normal--is-icon '
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'type' => 'button',
          'escape' => false,
        ],
        $attributes
      )
    );
  }

  /**
   * @param string $title
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function smallButton(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'button',
      $title,
      $this->mergeAttributes(
        [
          'class' => 'cc-button__normal cc-button__normal--is-small '
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'type' => 'button',
          'escape' => false,
        ],
        $attributes
      )
    );
  }

  /**
   * @param string $title
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function bigButton(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'button',
      $title,
      $this->mergeAttributes(
        [
          'class' => 'cc-button__normal cc-button__normal--is-big '
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'type' => 'button',
          'escape' => false,
        ],
        $attributes,
      )
    );
  }

  /**
   * @param ButtonIconEnum $icon
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function bigIconButton(
    ButtonIconEnum $icon,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'button',
      $this->getButtonIconHtml($icon),
      $this->mergeAttributes(
        [
          'class' => 'cc-button__normal cc-button__normal--is-big cc-button__normal--is-icon '
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'type' => 'button',
          'escape' => false,
        ],
        $attributes,
      )
    );
  }

  /**
   * @param string $title
   * @param ButtonColorEnum $color
   * @param bool $hideOnMobile
   * @return string
   */
  public function staticButton(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::DISABLED,
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'div',
      $title,
      [
        'class' => 'cc-button__normal '
          .$this->getButtonColorClass($color)
          .$this->getHideOnMobileCssClass($hideOnMobile),
        'escape' => false,
      ]
    );
  }

  /**
   * @param string $title
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function textButton(
    string $title,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'button',
      $title,
      $this->mergeAttributes(
        [
          'class' => 'cc-button__link'
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'type' => 'button',
        ],
        $attributes
      )
    );
  }

  /**
   * @param string $title
   * @param ButtonColorEnum $color
   * @param string $name
   * @param array $attributes
   * @return string
   */
  public function submitButton(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    string $name = '',
    array $attributes = [],
  ): string {
    return $this->Form->button(
      $title,
      $this->mergeAttributes(
        [
          'type' => 'submit',
          'templateVars' => ['buttonClass' => $this->getButtonColorClass($color)],
          'escape' => false,
          'name' => $name,
        ],
        $attributes
      )
    );
  }

  /**
   * @param string $title
   * @param ButtonColorEnum $color
   * @param string $name
   * @param array $attributes
   * @return string
   */
  public function bigSubmitButton(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    string $name = '',
    array $attributes = [],
  ): string {
    return $this->Form->submit(
      $title,
      [
        'templateVars' => [
          'buttonClass' => 'cc-button__normal--is-big '.$this->getButtonColorClass($color)
        ],
        'escape' => false,
        'name' => $name,
        ...$attributes
      ]
    );
  }

  /**
   * @param string $title
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function tableButton(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'button',
      $title,
      $this->mergeAttributes(
        [
          'class' => 'cc-button__normal cc-button__normal--is-table '
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'type' => 'button',
          'escape' => false,
        ],
        $attributes
      )
    );
  }

  /**
   * @param string $title
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function tableStaticButton(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::DISABLED,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'div',
      $title,
      $this->mergeAttributes(
        [
          'class' => 'cc-button__normal cc-button__normal--is-table '
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'escape' => false,
        ],
        $attributes
      )
    );
  }

  /**
   * @param string $title
   * @param string|array $url
   * @param ButtonColorEnum $color
   * @param bool $hideOnMobile
   * @return string
   */
  public function tableLinkButton(
    string $title,
    string|array $url,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->link(
      $title,
      UrlTool::Url($url),
      [
        'class' => 'cc-button__normal cc-button__normal--is-table '
          .$this->getButtonColorClass($color)
          .$this->getHideOnMobileCssClass($hideOnMobile),
        'escape' => false,
      ]
    );
  }

  /**
   * @param ButtonIconEnum $icon
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function tableIconButton(
    ButtonIconEnum $icon,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'button',
      $this->GetButtonIconHtml($icon),
      $this->mergeAttributes(
        [
          'class' => 'cc-button__normal cc-button__normal--is-icon cc-button__normal--is-table '
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'type' => 'button',
          'escape' => false,
        ],
        $attributes
      )
    );
  }

  /**
   * @param ButtonIconEnum $icon
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   *
   * @return string
   */
  public function tableStaticIconButton(
    ButtonIconEnum $icon,
    ButtonColorEnum $color = ButtonColorEnum::DISABLED,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->tag(
      'div',
      $this->GetButtonIconHtml($icon),
      $this->mergeAttributes(
        [
          'class' => 'cc-button__normal cc-button__normal--is-icon cc-button__normal--is-table '
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'escape' => false,
        ],
        $attributes
      )
    );
  }

  /**
   * @param ButtonIconEnum $icon
   * @param string|array $url
   * @param ButtonColorEnum $color
   * @param bool $hideOnMobile
   *
   * @return string
   */
  public function tableLinkIconButton(
    ButtonIconEnum $icon,
    string|array $url,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->link(
      $this->GetButtonIconHtml($icon),
      UrlTool::Url($url),
      [
        'class' => 'cc-button__normal cc-button__normal--is-icon cc-button__normal--is-table '
          .$this->getButtonColorClass($color)
          .$this->getHideOnMobileCssClass($hideOnMobile),
        'escape' => false,
      ]
    );
  }

  /**
   * @param string $title
   * @return string
   */
  public function closeButton(string $title): string
  {
    return $this->Html->tag(
      'button',
      $title,
      [
        'class' => 'cc-button__normal cc-button__normal--is-secondary',
        'type' => 'button',
        'escape' => false,
        'data-uf-click-action' => 'close',
        'data-uf-click-target' => '_dialog'
      ]
    );
  }

  /**
   * @param string $title
   * @param string|array $url
   * @param ButtonColorEnum $color
   * @param array $attributes
   * @param bool $hideOnMobile
   * @return string
   */
  public function footerLinkButton(
    string $title,
    string|array $url,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false,
  ): string {
    return $this->Html->link(
      $title,
      UrlTool::Url($url),
      $this->mergeAttributes(
        [
          'class' => 'cc-button__link cc-button__link--is-footer'
            .$this->getButtonColorClass($color)
            .$this->getHideOnMobileCssClass($hideOnMobile),
          'escape' => false,
        ],
        $attributes
      )
    );
  }

  /**
   * @param bool $on
   * @param string $onLabel
   * @param string $offLabel
   * @param array $attributes
   * @return string
   */
  public function toggleButton(
    bool $on,
    string $onLabel,
    string $offLabel,
    array $attributes = []
  ): string {
    $html = '<label class="cc-form__toggle-container">';
    $html .= $this->Form->checkbox(
      '',
      [
        'checked' => $on,
        'class' => 'cc-form__toggle-checkbox',
        ...$attributes,
      ]
    );
    $html .= '<span class="cc-form__toggle-label-checked">'.$onLabel.'</span>';
    $html .= '<span class="cc-form__toggle-label-unchecked">'.$offLabel.'</span>';
    $html .= '<span class="cc-form__toggle-span"></span>';
    $html .= '</label>';
    return $html;
  }

  /**
   * @param string $text
   * @param array $attributes
   * @return string
   */
  public function text(string $text, array $attributes = []): string
  {
    return $this->Html->tag('span', $text, ['class' => 'cc-text__normal', ...$attributes]);
  }

  /**
   * @param string $text
   * @param array $attributes
   * @return string
   */
  public function successText(string $text, array $attributes = []): string
  {
    return $this->Html->tag(
      'span', $text, ['class' => 'cc-text__normal cc-text--is-success', ...$attributes]
    );
  }

  /**
   * @param string $text
   * @param array $attributes
   * @return string
   */
  public function dangerText(string $text, array $attributes = []): string
  {
    return $this->Html->tag(
      'span', $text, ['class' => 'cc-text__normal cc-text--is-danger', ...$attributes]
    );
  }

  /**
   * @param string $text
   * @param array $attributes
   * @return string
   */
  public function textBlock(string $text, array $attributes = []): string
  {
    return $this->Html->tag('p', $text, ['class' => 'cc-text__normal', ...$attributes]);
  }

  /**
   * @param string|null $title
   * @param string[] $items
   *
   * @return string
   */
  public function textList(string|null $title, array $items): string
  {
    $result = '<div>';
    if ($title) {
      $result .= $this->textBlock($title);
    }
    $result .= '<ul class="cc-list__container">';
    foreach ($items as $item) {
      $result .= '<li class="cc-list__item">'.$this->text($item).'</li>';
    }
    $result .= '</ul></div>';
    return $result;
  }

  /**
   * @param string $text
   * @param array $attributes
   * @return string
   */
  public function strongTextBlock(string $text, array $attributes = []): string
  {
    return $this->Html->tag(
      'p',
      $text,
      ['class' => 'cc-text__normal cc-text--is-strong', ...$attributes]
    );
  }

  /**
   * @param string $text
   * @param array $attributes
   * @return string
   */
  public function title(string $text, array $attributes = []): string
  {
    if (empty($this->getView()->fetch('title'))) {
      $this->getView()->assign('title', $text);
      return $this->Html->tag('h1', $text, ['class' => 'cc-text__title', ...$attributes]);
    }
    return $this->Html->tag('h2', $text, ['class' => 'cc-text__title', ...$attributes]);
  }

  /**
   * @param string $text
   * @param array $attributes
   * @return string
   */
  public function smallTitle(string $text, array $attributes = []): string
  {
    return $this->Html->tag(
      'h3',
      $text,
      ['class' => 'cc-text__small-title', ...$attributes]
    );
  }

  /**
   * @param string $text
   * @param array $attributes
   * @return string
   */
  public function dialogTitle(string $text, array $attributes = []): string
  {
    return $this->Html->tag(
      'h3',
      $text,
      ['class' => 'cc-dialog__title cc-text__small-title', ...$attributes]
    );
  }

  /**
   * @param bool $checked
   * @return string
   */
  public function checkbox(bool $checked): string
  {
    return $checked ? $this->checkedCheckbox() : $this->uncheckedCheckbox();
  }

  /**
   * @param bool $show
   * @return string
   */
  public function checkedCheckbox(bool $show = true): string
  {
    return $show ? '<i class="fa-regular fa-check-square"></i>' : '';
  }

  /**
   * @param bool $show
   * @return string
   */
  public function uncheckedCheckbox(bool $show = true): string
  {
    return $show ? '<i class="fa-regular fa-square"></i>' : '';
  }

  /**
   * Renders the dialog, form, hidden input fields and content layout tags
   *
   * @param string $id Dom id of the dialog
   * @param string $title Title of dialog
   * @param ModelBase $data Data to post
   * @param array|null $url Url to post to or null to use current url
   * @param array $hiddenFields Either the name of the hidden field or name => data attribute to
   *  create an unlocked hidden input with a data attribute.
   *
   * @return string
   */
  public function beginFormDialog(
    string $id,
    string $title,
    ModelBase $data,
    array|null $url = null,
    array $hiddenFields = []

  ): string {
    $html = '<dialog id="'.$id.'" class="cc-dialog__container"';
    if ($data->hasErrors()) {
      $html .= ' data-uf-load-action="show-modal"';
      $html .= ' data-uf-event-action="reload"';
      $html .= ' data-uf-event-events="close"';
    }
    $html .= '>';
    $options = [
      'templates' => 'form_styles',
      'valueSources' => ['context'],
      'idPrefix' => basename(str_replace('\\', '/', get_class($data))),
    ];
    if ($url) {
      $options['url'] = UrlTool::url($url);
    }
    $html .= $this->Form->create($data, $options);
    foreach ($hiddenFields as $name => $value) {
      if (is_int($name)) {
        $html .= $this->Form->hidden($value);
      }
      else {
        $this->Form->unlockField($name);
        $html .= $this->Form->hidden($name, is_array($value) ? $value : [$value]);
      }
    }
    $html .= '<div class="cc-dialog__layout">';
    $html .= $this->dialogTitle($title);
    return $html;
  }

  /**
   * @return string
   */
  public function endFormDialog(): string
  {
    $html = '</div>';
    $html .= $this->Form->end();
    $html .= '</dialog>';
    return $html;
  }

  /**
   * @return string
   */
  public function beginFormContainer(): string
  {
    return '<div class="cc-form__container">';
  }

  /**
   * @return string
   */
  public function endFormContainer(): string
  {
    return '</div>';
  }

  /**
   * @return string
   */
  public function beginDialogButtons(): string
  {
    return '<div class="cc-dialog__buttons">';
  }

  /**
   * @return string
   */
  public function endDialogButtons(): string
  {
    return '</div>';
  }

  /**
   * @param GapEnum $gap
   * @return string
   */
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

  /**
   * @return string
   */
  public function endRow(): string
  {
    return '</div>';
  }

  /**
   * @param GapEnum $gap
   * @return string
   */
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

  /**
   * @return string
   */
  public function endColumn(): string
  {
    return '</div>';
  }

  /**
   * @return string
   */
  public function beginFormButtons(): string
  {
    return '<div class="cc-form__buttons">';
  }

  public function formButtonSpacer(): string
  {
    return '<div class="cc-form__button-spacer"></div>';
  }

  /**
   * @return string
   */
  public function endFormButtons(): string
  {
    return '</div>';
  }

  /**
   * @param string|null $storageId
   * @param bool $fullWidth
   * @return string
   */
  public function beginSortedTable(string|null $storageId, bool $fullWidth = false): string
  {
    $html = '
    <table
     class="cc-table__container'.($fullWidth ? ' cc-table__container--is-full-width' : '').'"
     data-uf-sorting
     data-uf-sort-ascending="cc-table__cell--is-ascending"
     data-uf-sort-descending="cc-table__cell--is-descending"
     ';
    if ($storageId) {
      $html .= ' data-uf-storage-id="'.$storageId.'"';
    }
    $html .= '>';
    return $html;
  }

  /**
   * @return string
   */
  public function endSortedTable(): string
  {
    return '</table>';
  }

  /**
   * Creates a table header row with cell elements containing sorting buttons.
   *
   * Each entry in the array is either a null, string or an array. If it is a string, it is used
   * as the header text.
   *
   * If it is an array, the values are processed. The first value that is not an
   * instance of {@link CellDataTypeEnum} or {@link CellStylingEnum} is used as the header text.
   *
   * If the value is a null value, the header is rendered as actions column that can not be sorted
   * upon.
   *
   * @param array $columns See comments.
   *
   * @return string
   */
  public function sortedTableHeader(array $columns): string
  {
    $html = '<tr class="cc-table__row cc-table__row--is-header" data-uf-header-row>';
    foreach ($columns as $value) {
      if ($value == null) {
        $html .= '<th class="cc-table__cell cc-table__cell--is-header cc-table__cell--is-tight">
          &nbsp;
        </th>
      ';
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

  /**
   * Each entry in the columns is either contains a value or an array. If it is a value, it is used
   * as the content of the cell.
   *
   * If it is array, the array gets processed. The first value that is not an instance of
   * {@link CellDataTypeEnum} or {@link CellStylingEnum} or {@link ContentPositionEnum} is used as
   * the content of the cell. If the value is an instance of {@link DateTimeInterface} it is
   * formatted as 'Y-m-d H:i'.
   *
   * To specify custom attributes for the cell, add a key and value pair to the array. The key is
   * the attribute name and the value its value.
   *
   * @param array $columns See comment.
   * @param array $buttons When not empty, add a table column with buttons.
   * @param bool $isActive True to add active state to the row and columns.
   *
   * @return string
   */
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
      $html .= $this->beginButtons();
      foreach ($buttons as $button) {
        $html .= $button;
      }
      $html .= $this->endButtons();
      $html .= '</td>';
    }
    $html .= '</tr>';
    return $html;
  }

  /**
   * @return string
   */
  public function beginPageButtons(): string
  {
    return '<nav class="cc-layout__buttons cc-layout__buttons--wrap">';
  }

  /**
   * @return string
   */
  public function endPageButtons(): string
  {
    return '</nav>';
  }

  /**
   * @return string
   */
  public function beginButtons(): string
  {
    return '<div class="cc-layout__buttons">';
  }

  /**
   * @return string
   */
  public function endButtons(): string
  {
    return '</div>';
  }

  /**
   * @return string
   */
  public function beginTabsContainer(): string
  {
    $this->m_tabId = uniqid('cc-tabs__container-');
    return '<div class="cc-tabs__container">';
  }

  /**
   * @return string
   */
  public function endTabsContainer(): string
  {
    return '</div>';
  }

  /**
   * This method should be called after a call to {@link beginTabsContainer()}.
   *
   * @param string $title
   * @param bool $selected
   * @return string
   */
  public function beginTab(string $title, bool $selected = false): string
  {
    $id = uniqid('cc-tabs__tab-');
    $html = '<input type="radio" id="'.$id.'" name="'.$this->m_tabId.'" class="cc-tabs__tab-radio" '
      .($selected ? ' checked' : '')
      .' />';
    $html .= '<label class="cc-tabs__title" for="'.$id.'">'.$title.'</label>';
    $html .= '<div class="cc-tabs__content">';
    return $html;
  }

  /**
   * @return string
   */
  public function endTab(): string
  {
    return '</div>';
  }

  #endregion

  #region private methods

  /**
   * @param ButtonColorEnum $color
   * @return string
   */
  private function getButtonColorClass(ButtonColorEnum $color): string
  {
    return match ($color) {
      ButtonColorEnum::PRIMARY => 'cc-button__normal--is-primary',
      ButtonColorEnum::SECONDARY => 'cc-button__normal--is-secondary',
      ButtonColorEnum::TERTIARY => 'cc-button__normal--is-tertiary',
      ButtonColorEnum::SUCCESS => 'cc-button__normal--is-success',
      ButtonColorEnum::DANGER => 'cc-button__normal--is-danger',
      ButtonColorEnum::WARNING => 'cc-button__normal--is-warning',
      ButtonColorEnum::DISABLED => 'cc-button__normal--is-disabled',
    };
  }

  /**
   * @param ButtonIconEnum $icon
   * @return string
   */
  private function getButtonIconHtml(ButtonIconEnum $icon): string
  {
    return match ($icon) {
      ButtonIconEnum::EDIT => '<i class="fas fa-pen"></i>',
      ButtonIconEnum::REMOVE => '<i class="fas fa-trash-can"></i>',
      ButtonIconEnum::PARTICIPANTS => '<i class="fas fa-users"></i>',
      ButtonIconEnum::WORKSHOP => '<i class="fas fa-computer"></i>',
      ButtonIconEnum::QR_CODE => '<i class="fas fa-qrcode"></i>',
      default => '',
    };
  }

  /**
   * @param int|string $key
   * @param mixed $value
   * @return array
   */
  private function checkContentPosition(int|string $key, mixed $value): array
  {
    if (
      is_int($key) &&
      !($value instanceof ContentPositionEnum) &&
      !($value instanceof CellStylingEnum)
    ) {
      $key = $value;
      $value = ContentPositionEnum::START;
    }
    return array($key, $value);
  }

  /**
   * @param mixed $key
   * @param mixed $value
   * @return array
   */
  private function checkTableCellEntry(mixed $key, mixed $value): array
  {
    list($key, $value) = $this->checkContentPosition($key, $value);
    if (is_array($key)) {
      reset($key);
      $value = current($key);
      $key = key($key);
      list($key, $value) = $this->checkContentPosition($key, $value);
    }
    return array($key, $value);
  }

  /**
   * @param mixed $cellValue
   * @return array
   */
  private function checkTableCellValue(mixed $cellValue): array
  {
    if (!is_array($cellValue)) {
      if ($cellValue instanceof ContentPositionEnum) {
        return array($cellValue, []);
      }
      else {
        if ($cellValue instanceof CellStylingEnum) {
          return array(ContentPositionEnum::START, []);
        }
        else {
          return array(ContentPositionEnum::START, [$cellValue]);
        }
      }
    }
    $attributes = [];
    $position = ContentPositionEnum::START;
    foreach ($cellValue as $key => $value) {
      if ($value instanceof ContentPositionEnum) {
        $position = $value;
      }
      elseif ($value instanceof CellStylingEnum) {
        continue;
      }
      else {
        $attributes[$key] = $value;
      }
    }
    return [$position, $attributes];
  }

  /**
   * Checks if any of the array values contains a {@link CellDataTypeEnum} and returns the
   * corresponding attribute definition.
   *
   * @param array $cellValues
   *
   * @return string Attribute definition or empty string if no sort type could be determined.
   */
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

  /**
   * Processes the array values and check for {@link CellStylingEnum} entries. Returns the
   * CSS classes for the request styling.
   *
   * @param array $cellValues
   *
   * @return string CSS classes or empty string if there was no styling value.
   */
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

  /**
   * Processes the values in an array and returns the first value that is not an instance of
   * {@link CellDataTypeEnum} or {@link CellStylingEnum} or {@link ContentPositionEnum}.
   *
   * If the value is a {@link DateTimeInterface} the date is formatted as 'Y-m-d H:i' else the
   * value is returned as is.
   *
   * @param array $values
   *
   * @return string
   */
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
      return $value;
    }
    return '';
  }

  /**
   * Processes the values in an array and returns the first value that is not an instance of
   * {@link CellDataTypeEnum} or {@link CellStylingEnum} or {@link ContentPositionEnum}.
   *
   * @param array $values
   *
   * @return mixed
   */
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

  /**
   * Gets the first value that is an instance of {@link ContentPositionEnum}.
   *
   * @param array $values
   *
   * @return ContentPositionEnum Found value or {@link ContentPositionEnum::START} if none is found.
   */
  private function getCellPosition(array $values): ContentPositionEnum
  {
    foreach ($values as $value) {
      if ($value instanceof ContentPositionEnum) {
        return $value;
      }
    }
    return ContentPositionEnum::START;
  }

  /**
   * Returns all entries that use string keys.
   *
   * @param array $values
   *
   * @return array
   */
  private function getAttributes(array $values): array
  {
    return array_filter($values, function ($key) {
      return is_string($key);
    }, ARRAY_FILTER_USE_KEY);
  }

  /**
   * Returns the CSS class for the hide on mobile state.
   *
   * @param bool $hideOnMobile
   *
   * @return string
   */
  private function getHideOnMobileCssClass(bool $hideOnMobile): string
  {
    return $hideOnMobile ? ' cc--hide-on-mobile' : '';
  }

  /**
   * Merges two attribute arrays. If both arrays contain a 'class' entry, the values are merged.
   *
   * Any other entry in extraAttributes overrides the value in attributes.
   *
   * @param array $attributes
   * @param array $extraAttributes
   *
   * @return array
   */
  private function mergeAttributes(array $attributes, array $extraAttributes): array
  {
    if (isset($attributes['class']) && isset($extraAttributes['class'])) {
      $attributes['class'] .= ' '.$extraAttributes['class'];
      unset($extraAttributes['class']);
    }
    return [
      ...$attributes,
      ...$extraAttributes,
    ];
  }

  #endregion
}
