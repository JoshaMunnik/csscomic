<?php

/**
 * @var ApplicationView $this
 */

use App\Model\Enum\ButtonColorEnum;
use App\View\ApplicationView;

?>
<p>
  The CSS comic website tries to teach some basic HTML and styling. The site exists a number of
  lessons, first focussing on different aspects of HTML and styling. And then introducing the user
  to the styles to create a comic with.
</p>
<p>
  This site uses a similar approach as <a href="https://hedy.org" target="_blank">HEDY</a> using the
  <a href="https://alvaromontoro.com/blog/68056/batman-comic-css" target="_blank">Batman and Robin styling</a>
  created by Alvar Montoro to style the comic
  (<a href="https://github.com/alvaromontoro/batman-comic.css">batman-comic.css at github</a>).
</p>
<?php if (!$this->isLoggedIn()) : ?>
  <p>
    The HTML code entered in the editor for each lesson is stored in the browsers local storage. To
    remove all the stored data, click:
    <?= $this->Styling->button(
      'Clear storage', ButtonColorEnum::DANGER, ['onclick' => 'localStorage.clear()']
    ) ?>
  </p>
  <p>
    It is also possible create an account via the 'Sign In' option at the top right. After a
    successful login, the HTML code is stored at the account on the server.
  </p>
<?php endif; ?>
