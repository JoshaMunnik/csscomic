<?php

use App\Controller\UsersController;
use App\Model\Constant\HtmlData;
use App\Model\Enum\ButtonColorEnum;
use App\Model\View\IdViewModel;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var IdViewModel $data
 * @var string $id
 */

$name = '<span '.HtmlData::USER_NAME.'></span>';

?>
<?= $this->Styling->Dialog->beginFormDialog(
  $id,
  __('Confirm remove'),
  $data,
  [UsersController::REMOVE],
  [IdViewModel::ID => HtmlData::USER_ID]
) ?>
<?= $this->Styling->Layout->beginColumn() ?>
<?= $this->Styling->Text->textBlock(
  __('Are you sure you want to remove the user "{0}"?', $name)
) ?>
<?= $this->Styling->Text->textBlock(
  __('Related lesson code and texts will also be removed.')
) ?>
<?= $this->Styling->Layout->endColumn() ?>
<?= $this->Styling->Dialog->beginDialogButtons() ?>
<?= $this->Styling->Button->submit(__('Yes, remove'), ButtonColorEnum::DANGER) ?>
<?= $this->Styling->Button->close(__('No, cancel')) ?>
<?= $this->Styling->Dialog->endDialogButtons() ?>
<?= $this->Styling->Dialog->endFormDialog() ?>
