<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper\Styling;

use App\Lib\Model\Base\ModelBase;
use App\Lib\Model\View\ViewModelBase;
use App\Model\Enum\CellDataTypeEnum;
use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class TableAndDialogHelperTest extends TestCase
{
  public function testSortedTableHeaderAndRow(): void
  {
    $view = new View(new ServerRequest());
    $view->loadHelper('Styling');

    $header = $view->Styling->Table->sortedTableHeader([
      [__('Name'), CellDataTypeEnum::TEXT],
      null,
    ]);
    $this->assertStringContainsString('cc-table__row--is-header', $header);

    $row = $view->Styling->Table->sortedTableRow([
      'Alice',
      null,
    ], []);
    $this->assertStringContainsString('cc-table__row--is-data', $row);
  }

  public function testDialogBeginEnd(): void
  {
    $view = new View(new ServerRequest());
    $view->loadHelper('Styling');

    // Create a dummy model implementing minimal interface
    $model = new ViewModelBase();

    $html = $view->Styling->Dialog->beginFormDialog('id1', 'Title', $model, null, []);
    $this->assertStringContainsString('<dialog', $html);
    $this->assertStringContainsString('cc-dialog__layout', $html);

    $end = $view->Styling->Dialog->endFormDialog();
    $this->assertStringContainsString('</dialog>', $end);
  }
}

