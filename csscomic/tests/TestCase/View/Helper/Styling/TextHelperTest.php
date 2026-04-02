<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper\Styling;

use App\Test\Support\TestViewWithStyling;
use Cake\TestSuite\TestCase;

class TextHelperTest extends TestCase
{
  public function testTextAndTitleRender(): void
  {
    $view = new TestViewWithStyling();

    $span = $view->Styling->Text->text('Hello');
    $this->assertStringContainsString('<span', $span);

    $titleHtml = $view->Styling->Text->title('My page');
    $this->assertStringContainsString('<h1', $titleHtml);
  }
}

