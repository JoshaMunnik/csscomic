<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper\Styling;

use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class TextHelperTest extends TestCase
{
  public function testTextAndTitleRender(): void
  {
    $view = new View(new ServerRequest(['url' => '/']));
    $view->loadHelper('Styling');

    $span = $view->Styling->Text->text('Hello');
    $this->assertStringContainsString('<span', $span);

    $titleHtml = $view->Styling->Text->title('My page');
    $this->assertStringContainsString('<h1', $titleHtml);
  }
}

