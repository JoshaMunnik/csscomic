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
<?= $this->Styling->beginFormDialog($id, __('Delete account'), new ViewModelBase(), HomeController::INDEX) ?>
<?= $this->Styling->textBlock(
  __('Click the button to sent an email with instructions on how to delete your account.')
) ?>
<?= $this->Styling->beginDialogButtons() ?>
<?= $this->Styling->submitButton(
  __('Send email'),
  ButtonColorEnum::PRIMARY,
  ApplicationControllerBase::SUBMIT_REQUEST_DELETE_ACCOUNT,
) ?>
<?= $this->Styling->closeButton(__('Cancel')) ?>
<?= $this->Styling->endDialogButtons() ?>
<?= $this->Styling->endFormDialog() ?>
