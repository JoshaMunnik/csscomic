<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper\Styling;

use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class LayoutHelperTest extends TestCase
{
  public function testBeginEndRowColumn(): void
  {
    $view = new View(new ServerRequest());
    $view->loadHelper('Styling');

    $this->assertStringContainsString('cc-layout__row', $view->Styling->Layout->beginRow());
    $this->assertSame('</div>', $view->Styling->Layout->endRow());
    $this->assertStringContainsString('cc-layout__column', $view->Styling->Layout->beginColumn());
    $this->assertSame('</div>', $view->Styling->Layout->endColumn());
  }

  public function testTabsContainerAndTab(): void
  {
    $view = new View(new ServerRequest());
    $view->loadHelper('Styling');

    $html = $view->Styling->Layout->beginTabsContainer();
    $this->assertStringContainsString('cc-tabs__container', $html);

    $tab = $view->Styling->Layout->beginTab('T', true);
    $this->assertStringContainsString('cc-tabs__tab-radio', $tab);
    $this->assertStringContainsString('cc-tabs__content', $tab);
  }
}

