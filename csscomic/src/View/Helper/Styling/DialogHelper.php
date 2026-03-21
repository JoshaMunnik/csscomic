<?php
declare(strict_types=1);

namespace App\View\Helper\Styling;

use App\Lib\Model\Base\ModelBase;
use App\Tool\UrlTool;
use Cake\View\Helper;
use Cake\View\Helper\FormHelper;
use Cake\View\Helper\HtmlHelper;

/**
 * @property FormHelper $Form
 * @property HtmlHelper $Html
 */
class DialogHelper extends Helper
{
  protected array $helpers = ['Form', 'Html'];

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
    $html .= $this->Html->tag('h3', $title, ['class' => 'cc-dialog__title cc-text__small-title']);
    return $html;
  }

  public function endFormDialog(): string
  {
    $html = '</div>';
    $html .= $this->Form->end();
    $html .= '</dialog>';
    return $html;
  }

  public function beginFormContainer(): string
  {
    return '<div class="cc-form__container">';
  }

  public function endFormContainer(): string
  {
    return '</div>';
  }

  public function beginDialogButtons(): string
  {
    return '<div class="cc-dialog__buttons">';
  }

  public function endDialogButtons(): string
  {
    return '</div>';
  }

  public function beginFormButtons(): string
  {
    return '<div class="cc-form__buttons">';
  }

  public function formButtonSpacer(): string
  {
    return '<div class="cc-form__button-spacer"></div>';
  }

  public function endFormButtons(): string
  {
    return '</div>';
  }
}

