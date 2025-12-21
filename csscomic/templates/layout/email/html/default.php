<?php
/**
 * @var ApplicationView $this
 */

use App\View\ApplicationView;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title><?= $this->fetch('title') ?></title>
</head>
<body>
    <?= $this->fetch('content') ?>
</body>
</html>
