<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper\Styling;

use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class ButtonHelperTest extends TestCase
{
  public function testLinkButtonProducesAnchorWithClass(): void
  {
    $view = new View(new ServerRequest(['url' => '/']), new Response());
    $view->loadHelper('Styling');

    $html = $view->Styling->Button->link('Go', 'http://example.com');
    $this->assertStringContainsString('cc-button__normal', $html);
    $this->assertStringContainsString('http://example.com', $html);
  }

  public function testLinkButtonMergesClassAttribute(): void
  {
    $view = new View(new ServerRequest(['url' => '/']));
    $view->loadHelper('Styling');

    $html = $view->Styling->Button->link('Go', 'http://example.com',
      \App\Model\Enum\ButtonColorEnum::PRIMARY, true);
    $this->assertStringContainsString('cc--hide-on-mobile', $html);
  }
}

