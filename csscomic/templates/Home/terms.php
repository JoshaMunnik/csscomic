<?php

use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

?>
<div class="cc-main__page">
  <?= $this->Styling->title(__('Terms and conditions')) ?>
  <?= $this->contentElement('text/terms') ?>
</div>
