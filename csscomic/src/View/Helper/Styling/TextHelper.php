<?php
declare(strict_types=1);

namespace App\View\Helper\Styling;

use Cake\View\Helper;
use Cake\View\Helper\HtmlHelper;

/**
 * @property HtmlHelper $Html
 */
class TextHelper extends Helper
{
  protected array $helpers = ['Html'];

  public function text(string $text, array $attributes = []): string
  {
    return $this->Html->tag('span', $text, ['class' => 'cc-text__normal', ...$attributes]);
  }

  public function successText(string $text, array $attributes = []): string
  {
    return $this->Html->tag('span', $text,
      ['class' => 'cc-text__normal cc-text--is-success', ...$attributes]);
  }

  public function dangerText(string $text, array $attributes = []): string
  {
    return $this->Html->tag('span', $text,
      ['class' => 'cc-text__normal cc-text--is-danger', ...$attributes]);
  }

  public function textBlock(string $text, array $attributes = []): string
  {
    return $this->Html->tag('p', $text, ['class' => 'cc-text__normal', ...$attributes]);
  }

  public function strongTextBlock(string $text, array $attributes = []): string
  {
    return $this->Html->tag('p', $text,
      ['class' => 'cc-text__normal cc-text--is-strong', ...$attributes]);
  }

  public function title(string $text, array $attributes = []): string
  {
    $view = $this->Html->getView();
    if (empty($view->fetch('title'))) {
      $view->assign('title', $text);
      return $this->Html->tag('h1', $text, ['class' => 'cc-text__title', ...$attributes]);
    }
    return $this->Html->tag('h2', $text, ['class' => 'cc-text__title', ...$attributes]);
  }

  public function smallTitle(string $text, array $attributes = []): string
  {
    return $this->Html->tag('h3', $text, ['class' => 'cc-text__small-title', ...$attributes]);
  }

  public function dialogTitle(string $text, array $attributes = []): string
  {
    return $this->Html->tag('h3', $text,
      ['class' => 'cc-dialog__title cc-text__small-title', ...$attributes]);
  }

  public function textList(?string $title, array $items): string
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

  public function checkbox(bool $checked): string
  {
    return $checked ? $this->checkedCheckbox() : $this->uncheckedCheckbox();
  }

  public function checkedCheckbox(bool $show = true): string
  {
    return $show ? '<i class="fa-regular fa-check-square"></i>' : '';
  }

  public function uncheckedCheckbox(bool $show = true): string
  {
    return $show ? '<i class="fa-regular fa-square"></i>' : '';
  }
}

