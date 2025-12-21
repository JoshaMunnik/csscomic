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
  <?= $this->Styling->title(__('Users')) ?>
  <?= $this->element('messages') ?>
  <?= $this->Styling->beginPageButtons() ?>
  <?= $this->Styling->linkButton(__('Add user'), [UsersController::EDIT]) ?>
  <?= $this->Styling->linkButton(
    __('Home'), AdministratorController::INDEX, ButtonColorEnum::SECONDARY
  ) ?>
  <?= $this->Styling->endPageButtons() ?>
  <?php
  $tabs = [false => __('Normal'), true => __('Administrators')];
  echo $this->Styling->beginTabsContainer();
  foreach ($tabs as $administrator => $label) {
    echo $this->Styling->beginTab($label, !$administrator);
    $filteredUsers = array_filter($users, fn($user) => $user->administrator == $administrator);
    if (empty($filteredUsers)) {
      echo $this->Styling->smallTitle(__('No users'));
    }
    else {
      echo $this->Styling->beginSortedTable(
        $administrator ? HtmlStorageKey::ADMINISTRATORS_TABLE : HtmlStorageKey::USERS_TABLE, true
      );
      echo $this->Styling->sortedTableHeader([
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
        echo $this->Styling->sortedTableRow(
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
            $this->Styling->tableLinkButton(
              __('edit'),
              [UsersController::EDIT, $user->id]
            ),
            $this->Styling->tableButton(
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
      echo $this->Styling->endSortedTable();
    }
    echo $this->Styling->endTab();
  }
  echo $this->Styling->endTabsContainer();
  ?>
</div>
<?= $this->element(
  'dialog/remove_user', ['id' => REMOVE_DIALOG, 'data' => new IdViewModel()]
) ?>
