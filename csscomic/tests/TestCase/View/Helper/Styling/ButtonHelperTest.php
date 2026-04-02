<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper\Styling;

use App\Model\Enum\ButtonColorEnum;
use App\Test\Support\TestViewWithStyling;
use Cake\TestSuite\TestCase;

class ButtonHelperTest extends TestCase
{
  public function testLinkButtonProducesAnchorWithClass(): void
  {
    $view = new TestViewWithStyling();

    $html = $view->Styling->Button->link('Go', 'http://example.com');
    $this->assertStringContainsString('cc-button__normal', $html);
    $this->assertStringContainsString('http://example.com', $html);
  }

  public function testLinkButtonMergesClassAttribute(): void
  {
    $view = new TestViewWithStyling();

    $html = $view->Styling->Button->link(
      'Go', 'http://example.com', ButtonColorEnum::PRIMARY, true
    );
    $this->assertStringContainsString('cc--hide-on-mobile', $html);
  }
}

