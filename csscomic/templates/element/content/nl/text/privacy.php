<?php

use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

?>
<p>
  Ingangsdatum: 1 december 2025
</p>
<p>
  Bij CSS Comic hanteren we een "privacy-first" benadering van leren. We verzamelen alleen de minimale hoeveelheid
  gegevens die nodig is om je een functionele en gepersonaliseerde ervaring te bieden.
</p>
<h3>1. Informatie die we verzamelen</h3>
<p>
  Omdat onze login optioneel is, hangt de hoeveelheid gegevens die we verzamelen af van hoe je de site gebruikt:
</p>
<ul>
  <li>
    <strong>Gastgebruikers:</strong> Als je lessen bekijkt en voltooit zonder in te loggen, verzamelen we geen
    persoonsgegevens. Je voortgang wordt niet opgeslagen op onze servers. Je voortgang wordt alleen opgeslagen in de
    lokale opslag van je browser. Je kunt deze gegevens op elk moment verwijderen via de knop <em>Wis opslag</em>
    op de home-pagina.
  </li>
  <li>
    <strong>Geregistreerde gebruikers:</strong> Als je ervoor kiest om een account aan te maken, verzamelen we:
    <ul>
      <li>
        <strong>Accountgegevens:</strong> Zoals je e-mailadres, een gebruikersnaam en een wachtwoord.
      </li>
      <li>
        <strong>Door de gebruiker gegenereerde inhoud:</strong> Alle tekst, notities of antwoorden die je binnen de
        lessen invoert. Dit wordt opgeslagen in onze database, zodat je er later vanaf elk apparaat bij kunt.
      </li>
    </ul>
  </li>
</ul>
<h3>2. Hoe we uw gegevens gebruiken</h3>
<p>
  Wij gebruiken de verzamelde informatie uitsluitend voor de volgende doeleinden:
</p>
<ul>
  <li>
    Om je account aan te bieden en te onderhouden.
  </li>
  <li>
    Om je les voortgang en notities op te slaan en op te halen.
  </li>
  <li>
    Om je in staat te stellen verder te gaan waar je gebleven was.
  </li>
</ul>
<p>
  Wij verkopen je gegevens niet aan derden en gebruiken je invoer niet voor advertenties of profilering.
</p>
<h3>3. Gegevensopslag en beveiliging</h3>
<p>
  Je gegevens worden veilig opgeslagen in een database op onze servers. Wij hanteren standaard
  beveiligingsmaatregelen (zoals SSL-versleuteling) om je informatie te beschermen tegen ongeautoriseerde toegang. Je
  wachtwoord wordt nooit direct opgeslagen; in plaats daarvan gebruiken we een veilige hashing-algoritme.
</p>
<h3>4. Cookies</h3>
<p>
  Wij gebruiken cookies uitsluitend voor authenticatie-doeleinden. Als je inlogt, helpt een cookie onze server te
  onthouden wie je bent terwijl je van de ene naar de andere les navigeert. Wij gebruiken geen
  tracking- of marketingcookies.
</p>
<h3>5. Uw rechten en controle</h3>
<p>
  Je hebt de controle over je gegevens. Op elk moment kan je:
</p>
<ul>
  <li>
    <strong>Kiezen om niet in te loggen:</strong> Je kan alle lessen als gast volgen zonder gegevens te verstrekken.
  </li>
  <li>
    <strong>Inhoud bewerken of verwijderen:</strong> Je kan de tekst die je in een les hebt ingevoerd, wijzigen
    of verwijderen.
  </li>
  <li>
    <strong>Je persoonlijke informatie aanpassen:</strong> Nadat je ingelogd bent, kan je je naam en wachtwoord
    wijzigen op de home-pagina met de <em>wijzig profiel</em> en <em>wijzig wachtwoord</em> buttons.
  </li>
  <li>
    <strong>Je account verwijderen:</strong> Nadat je ingelogd bent, kan je je account verwijderen met de
    <em>verwijder account</em> op de home-pagina. Of je kan contact met ons opnemen via
    <?= $this->element('contact_email') ?> met het verzoek je account te verwijderen.
  </li>
</ul>
<h3>6. Diensten van derden</h3>
<p>
  Wij delen je gegevens niet met diensten van derden, behalve wanneer dit wettelijk vereist is of noodzakelijk is
  voor de technische werking van onze server (bijv. onze hostingprovider).
</p>
<h3>7. Wijzigingen aan dit beleid</h3>
<p>
  Wij kunnen dit beleid van tijd tot tijd bijwerken. Eventuele wijzigingen zullen op deze pagina worden geplaatst
  met een bijgewerkte "Ingangsdatum".
</p>
<h3>10. Contact</h3>
<p>
  Als je vragen hebt over dit Privacybeleid, neem dan contact met ons op via: <?= $this->element('contact_email') ?>
</p>
