<?php

use App\Controller\HomeController;
use App\Lib\Controller\ApplicationControllerBase;
use App\Lib\Model\View\ViewModelBase;
use App\Model\Enum\ButtonColorEnum;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var string $id
 */

?>
<?= $this->Styling->Dialog->beginFormDialog($id, __('Delete account'), new ViewModelBase(), HomeController::INDEX) ?>
<?= $this->Styling->Text->textBlock(
  __('Click the button to sent an email with instructions on how to delete your account.')
) ?>
<?= $this->Styling->Dialog->beginDialogButtons() ?>
<?= $this->Styling->Button->submit(
  __('Send email'),
  ButtonColorEnum::PRIMARY,
  ApplicationControllerBase::SUBMIT_REQUEST_DELETE_ACCOUNT,
) ?>
<?= $this->Styling->Button->close(__('Cancel')) ?>
<?= $this->Styling->Dialog->endDialogButtons() ?>
<?= $this->Styling->Dialog->endFormDialog() ?>
