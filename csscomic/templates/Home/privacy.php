<?php

use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

?>
<div class="cc-main__page">
  <?= $this->Styling->Text->title(__('Privacy Policy')) ?>
  <?= $this->contentElement('text/privacy') ?>
</div>
