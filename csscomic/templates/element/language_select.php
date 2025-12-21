<?php

use App\Model\Constant\HtmlAction;
use App\Model\Constant\Language;
use App\Tool\UrlTool;
use App\View\ApplicationView;
use Cake\I18n\I18n;
use Cake\Routing\Router;

/**
 * @var ApplicationView $this
 */

$currentLanguage = I18n::getLocale() ?? Language::DEFAULT_CODE;
$controller = $this->request->getParam(UrlTool::CONTROLLER);
$action = $this->request->getParam(UrlTool::ACTION);
$parameters = $this->request->getParam('pass');
$languages = Language::getList();
$values = [];
$selected = '';
// for every language build an url to the same action and controller with the same parameters
foreach ($languages as $code => $name) {
  $url= Router::Url([
    UrlTool::CONTROLLER => $controller,
    UrlTool::ACTION => $action,
    UrlTool::LANGUAGE => $code,
    ...$parameters
  ]);
  $values[$url] = $name;
  if ($code === $currentLanguage) {
    $selected = $url;
  }
}
?>
<div class="cc-language__container">
  <?= $this->Form->select(
    'language',
    $values,
    [
      'value' => $selected,
      HtmlAction::SELECT_URL => '$value$',
      'class' => 'cc-language__select'
    ]
  ) ?>
</div>
