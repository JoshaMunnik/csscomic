<?php
declare(strict_types=1);

namespace App\View\Helper\Styling;

use App\Model\Enum\ButtonColorEnum;
use App\Tool\UrlTool;
use Cake\View\Helper;
use Cake\View\Helper\FormHelper;
use Cake\View\Helper\HtmlHelper;

/**
 * Button helper extracted from StylingHelper.
 *
 * This helper is instantiated by Cake and depends on the Html and Form helpers.
 *
 * @property HtmlHelper $Html
 * @property FormHelper $Form
 */
class ButtonHelper extends Helper
{
  protected array $helpers = ['Html', 'Form'];

  // Button methods (copied & simplified)
  public function link(
    string $title,
    string|array $url,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    bool $hideOnMobile = false
  ): string {
    return $this->Html->link(
      $title,
      UrlTool::Url($url),
      [
        'class' => 'cc-button__normal '.$this->getButtonColorClass($color).$this->getHideOnMobileCssClass($hideOnMobile),
        'escape' => false,
      ]
    );
  }

  public function linkSmall(
    string $title,
    string|array $url,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    bool $hideOnMobile = false
  ): string {
    return $this->Html->link(
      $title,
      UrlTool::Url($url),
      [
        'class' => 'cc-button__normal cc-button__normal--is-small '.$this->getButtonColorClass($color).$this->getHideOnMobileCssClass($hideOnMobile),
        'escape' => false,
      ]
    );
  }

  public function linkText(string $title, string|array $url): string
  {
    return $this->Html->link($title, UrlTool::Url($url),
      ['class' => 'cc-button__link', 'escape' => false]);
  }

  public function normal(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false
  ): string {
    return $this->Html->tag('button', $title, $this->mergeAttributes([
      'class' => 'cc-button__normal '.$this->getButtonColorClass($color).$this->getHideOnMobileCssClass($hideOnMobile),
      'type' => 'button',
      'escape' => false,
    ], $attributes));
  }

  public function small(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false
  ): string {
    return $this->Html->tag('button', $title, $this->mergeAttributes([
      'class' => 'cc-button__normal cc-button__normal--is-small '.$this->getButtonColorClass($color).$this->getHideOnMobileCssClass($hideOnMobile),
      'type' => 'button',
      'escape' => false,
    ], $attributes));
  }

  public function big(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false
  ): string {
    return $this->Html->tag('button', $title, $this->mergeAttributes([
      'class' => 'cc-button__normal cc-button__normal--is-big '.$this->getButtonColorClass($color).$this->getHideOnMobileCssClass($hideOnMobile),
      'type' => 'button',
      'escape' => false,
    ], $attributes));
  }

  public function static(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::DISABLED,
    bool $hideOnMobile = false
  ): string {
    return $this->Html->tag('div', $title, [
      'class' => 'cc-button__normal '.$this->getButtonColorClass($color).$this->getHideOnMobileCssClass($hideOnMobile),
      'escape' => false
    ]);
  }

  public function text(string $title, array $attributes = [], bool $hideOnMobile = false): string
  {
    return $this->Html->tag('button', $title, $this->mergeAttributes([
      'class' => 'cc-button__link'.$this->getHideOnMobileCssClass($hideOnMobile),
      'type' => 'button'
    ], $attributes));
  }

  public function submit(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    string $name = '',
    array $attributes = []
  ): string {
    return $this->Form->submit($title, $this->mergeAttributes([
      'type' => 'submit',
      'templateVars' => ['buttonClass' => $this->getButtonColorClass($color)],
      'escape' => false,
      'name' => $name
    ], $attributes));
  }

  public function bigSubmit(
    string $title,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    string $name = '',
    array $attributes = []
  ): string {
    return $this->Form->submit($title, [
      'templateVars' => ['buttonClass' => 'cc-button__normal--is-big '.$this->getButtonColorClass($color)],
      'escape' => false,
      'name' => $name,
      ...$attributes
    ]);
  }

  public function close(string $title): string
  {
    return $this->Html->tag('button', $title, [
      'class' => 'cc-button__normal cc-button__normal--is-secondary',
      'type' => 'button',
      'escape' => false,
      'data-uf-click-action' => 'close',
      'data-uf-click-target' => '_dialog'
    ]);
  }

  public function footerLink(
    string $title,
    string|array $url,
    ButtonColorEnum $color = ButtonColorEnum::PRIMARY,
    array $attributes = [],
    bool $hideOnMobile = false
  ): string {
    return $this->Html->link($title, UrlTool::Url($url), $this->mergeAttributes([
      'class' => 'cc-button__link cc-button__link--is-footer'.$this->getButtonColorClass($color).$this->getHideOnMobileCssClass($hideOnMobile),
      'escape' => false
    ], $attributes));
  }

  public function toggle(
    bool $on,
    string $onLabel,
    string $offLabel,
    array $attributes = []
  ): string {
    $html = '<label class="cc-form__toggle-container">';
    $html .= $this->Form->checkbox('',
      ['checked' => $on, 'class' => 'cc-form__toggle-checkbox', ...$attributes]);
    $html .= '<span class="cc-form__toggle-label-checked">'.$onLabel.'</span>';
    $html .= '<span class="cc-form__toggle-label-unchecked">'.$offLabel.'</span>';
    $html .= '<span class="cc-form__toggle-span"></span>';
    $html .= '</label>';
    return $html;
  }

  // Private utilities

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

  private function getHideOnMobileCssClass(bool $hideOnMobile): string
  {
    return $hideOnMobile ? ' cc--hide-on-mobile' : '';
  }

  private function mergeAttributes(array $attributes, array $extraAttributes): array
  {
    if (isset($attributes['class']) && isset($extraAttributes['class'])) {
      $attributes['class'] .= ' '.$extraAttributes['class'];
      unset($extraAttributes['class']);
    }
    return [...$attributes, ...$extraAttributes];
  }
}
