<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper\Styling;

use App\Test\Support\TestViewWithStyling;
use Cake\TestSuite\TestCase;

class LayoutHelperTest extends TestCase
{
  public function testBeginEndRowColumn(): void
  {
    $view = new TestViewWithStyling();

    $this->assertStringContainsString('cc-layout__row', $view->Styling->Layout->beginRow());
    $this->assertSame('</div>', $view->Styling->Layout->endRow());
    $this->assertStringContainsString('cc-layout__column', $view->Styling->Layout->beginColumn());
    $this->assertSame('</div>', $view->Styling->Layout->endColumn());
  }

  public function testTabsContainerAndTab(): void
  {
    $view = new TestViewWithStyling();

    $html = $view->Styling->Layout->beginTabsContainer();
    $this->assertStringContainsString('cc-tabs__container', $html);

    $tab = $view->Styling->Layout->beginTab('T', true);
    $this->assertStringContainsString('cc-tabs__tab-radio', $tab);
    $this->assertStringContainsString('cc-tabs__content', $tab);
  }
}

