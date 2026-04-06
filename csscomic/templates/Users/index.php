<?php

use App\Controller\AdministratorController;
use App\Controller\UsersController;
use App\Model\Constant\HtmlAction;
use App\Model\Constant\HtmlData;
use App\Model\Constant\HtmlStorageKey;
use App\Model\Constant\Lesson;
use App\Model\Entity\LessonEntity;
use App\Model\Entity\UserWithLessonsEntity;
use App\Model\Enum\ButtonColorEnum;
use App\Model\Enum\CellDataTypeEnum;
use App\Model\Enum\CellStylingEnum;
use App\Model\Enum\ContentPositionEnum;
use App\Model\View\IdViewModel;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var UserWithLessonsEntity[] $users
 */

const REMOVE_DIALOG = 'remove';

?>
<div class="cc-main__page">
  <?= $this->Styling->Text->title(__('Users')) ?>
  <?= $this->Styling->Layout->beginPageButtons() ?>
  <?= $this->Styling->Button->link(__('Add user'), [UsersController::EDIT]) ?>
  <?= $this->Styling->Button->link(
    __('Home'), AdministratorController::INDEX, ButtonColorEnum::SECONDARY
  ) ?>
  <?= $this->Styling->Layout->endPageButtons() ?>
  <?php
  $tabs = [false => __('Normal'), true => __('Administrators')];
  echo $this->Styling->Layout->beginTabsContainer();
  foreach ($tabs as $administrator => $label) {
    echo $this->Styling->Layout->beginTab($label, !$administrator);
    $filteredUsers = array_filter($users, fn($user) => $user->administrator == $administrator);
    if (empty($filteredUsers)) {
      echo $this->Styling->Text->smallTitle(__('No users'));
    }
    else {
      echo $this->Styling->Table->beginSortedTable(
        $administrator ? HtmlStorageKey::ADMINISTRATORS_TABLE : HtmlStorageKey::USERS_TABLE, true
      );
      echo $this->Styling->Table->sortedTableHeader([
        [__('Email'), CellDataTypeEnum::TEXT],
        [__('Name'), CellDataTypeEnum::TEXT],
        [__('Language'), CellDataTypeEnum::TEXT, CellStylingEnum::TIGHT],
        [__('Created'), CellDataTypeEnum::DATE, CellStylingEnum::TIGHT],
        [__('Last visit'), CellDataTypeEnum::DATE, CellStylingEnum::TIGHT],
        [__('Lessons').'('.Lesson::getLessonCount().')', CellDataTypeEnum::DATE, CellStylingEnum::TIGHT],
        [__('Comics').'('.Lesson::getCreateComicCount().')', CellDataTypeEnum::DATE, CellStylingEnum::TIGHT],
        null,
      ]);
      foreach ($filteredUsers as $user) {
        echo $this->Styling->Table->sortedTableRow(
          [
            $user->email,
            $user->name,
            $user->language_code,
            $user->created,
            [$user->last_visit_date?->format('Y-m-d') ?? '', CellStylingEnum::DATE],
            [LessonEntity::getLessonCount($user->lessons), ContentPositionEnum::END],
            [LessonEntity::getComicCount($user->lessons), ContentPositionEnum::END],
          ],
          [
            $this->Styling->Button->linkSmall(
              __('edit'),
              [UsersController::EDIT, $user->id]
            ),
            $this->Styling->Button->small(
              __('remove'),
              ButtonColorEnum::DANGER,
              [
                HtmlAction::SHOW_DIALOG => '#'.REMOVE_DIALOG,
                HtmlData::USER_ID => $user->id,
                HtmlData::USER_NAME => $user->name,
              ]
            ),
          ],
          $this->isUser($user)
        );
      }
      echo $this->Styling->Table->endSortedTable();
    }
    echo $this->Styling->Layout->endTab();
  }
  echo $this->Styling->Layout->endTabsContainer();
  ?>
</div>
<?= $this->element(
  'dialog/remove_user', ['id' => REMOVE_DIALOG, 'data' => new IdViewModel()]
) ?>
