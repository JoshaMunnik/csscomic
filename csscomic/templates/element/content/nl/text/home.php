<?php

/**
 * @var ApplicationView $this
 */

use App\Model\Enum\ButtonColorEnum;
use App\View\ApplicationView;

?>
<p>
  De CSS comic website probeert informatie te geven over de basis van HTML and het stijlen hiervan.
  The website gebruikt hiervoor een aantal lessen. Eerst gaan de lessen over HTML en het stijlen
  algemeen. Daarna worden de stijlen voor het maken van een stripverhaal geïntroduceerd.
</p>
<p>
  Deze website gebruikt een soortgelijke opbouw als
  <a href="https://hedy.org" target="_blank">HEDY</a>; voor de stripverhalen worden de stijlen van
  <a href="https://alvaromontoro.com/blog/68056/batman-comic-css" target="_blank">
    Batman and Robin styling
  </a>
  gebruikt, die gecreëerd zijn door Alvar Montoro
  (<a href="https://github.com/alvaromontoro/batman-comic.css">batman-comic.css at github</a>).
</p>
<?php if (!$this->isLoggedIn()) : ?>
  <p>
    De HTML code die bij elke les wordt ingevoerd, wordt opgeslagen in lokale opslag van de browser.
    Om de data in deze lokale opslag te verwijderen (voor deze website), klik:
    <?= $this->Styling->button(
      'Wis opslag', ButtonColorEnum::DANGER, ['onclick' => 'localStorage.clear()']
    ) ?>
  </p>
  <p>
    Het is ook mogelijk om een account aan te maken via de 'Inloggen' link rechts bovenin.
    Na een succesvolle inlog, wordt de ingevoerd HTML code op de server voor dat account opgeslagen.
  </p>
<?php endif; ?>
