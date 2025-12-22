<?php

use App\Controller\HomeController;
use App\Model\Enum\ButtonColorEnum;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

?>
<footer class="cc-footer__container">
  <div class="cc-footer__links">
    <?= $this->Styling->footerLinkButton(
      __('Home'),
      HomeController::INDEX,
    ) ?>
    <?= $this->Styling->footerLinkButton(
      __('Privacy Policy'),
      HomeController::PRIVACY,
    ) ?>
    <?= $this->Styling->footerLinkButton(
      __('Terms and conditions'),
      HomeController::TERMS,
    ) ?>
    <?= $this->Styling->footerLinkButton(
      'Source at Github',
      'https://github.com/JoshaMunnik/csscomic',
      ButtonColorEnum::PRIMARY,
      [
        'target' => '_blank',
        'rel' => 'noopener noreferrer'
      ]
    ) ?>
  </div>
  <div class="cc-footer__copyright">
    &copy; 2025
    <?= $this->Styling->footerLinkButton(
      'Ultra Force Development',
      'https://www.ultraforce.com',
      ButtonColorEnum::PRIMARY,
      [
        'target' => '_blank',
        'rel' => 'noopener noreferrer'
      ]
    ) ?>
  </div>
</footer>
