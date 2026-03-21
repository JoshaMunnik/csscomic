<?php
declare(strict_types=1);

namespace App\Test\TestCase\Tool;

use App\Model\Constant\Language;
use App\Tool\UrlTool;
use Cake\I18n\I18n;
use Cake\TestSuite\TestCase;

/**
 * Tests for {@link \App\Tool\UrlTool}
 */
class UrlToolTest extends TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // Ensure a predictable locale for language insertion
    I18n::setLocale(Language::DEFAULT_CODE);
  }

  public function testUrlReturnsStringWhenHttp(): void
  {
    $u1 = 'http://example.com/path';
    $u2 = 'HTTPS://example.com/other';

    $this->assertSame($u1, UrlTool::url($u1));
    $this->assertSame($u2, UrlTool::url($u2));
  }

  public function testArrayWithControllerAndActionIsProcessed(): void
  {
    I18n::setLocale('en');
    $res = UrlTool::url(['UsersController', 'edit', 1]);

    $this->assertIsArray($res);
    $this->assertArrayHasKey('controller', $res);
    $this->assertArrayHasKey('action', $res);
    $this->assertSame('users', $res['controller']);
    $this->assertSame('edit', $res['action']);
    // parameter preserved
    $this->assertContains(1, array_values($res));
    // language added
    $this->assertArrayHasKey('language', $res);
    $this->assertSame(Language::DEFAULT_CODE, $res['language']);
  }

  public function testControllerNameWithFQNIsDasherized(): void
  {
    $name = UrlTool::controllerName('App\\Controller\\SomeThingController');
    $this->assertSame('some-thing', $name);

    $name2 = UrlTool::controllerName('UsersController');
    $this->assertSame('users', $name2);
  }

  public function testReturnsEarlyWhenControllerAndActionArePresent(): void
  {
    I18n::setLocale('en');
    $input = ['controller' => 'users', 'action' => 'index'];
    $res = UrlTool::url($input);
    // should return array with controller and action preserved, and language added
    $this->assertIsArray($res);
    $this->assertSame('users', $res['controller']);
    $this->assertSame('index', $res['action']);
    $this->assertArrayHasKey('language', $res);
  }

  public function testNonHttpStringIsTreatedAsActionAndLanguageAdded(): void
  {
    I18n::setLocale('en');
    $res = UrlTool::url('/some/path');
    $this->assertIsArray($res);
    $this->assertArrayHasKey('action', $res);
    $this->assertSame('/some/path', $res['action']);
    $this->assertArrayHasKey('language', $res);
  }

  public function testVariadicParametersAreAppended(): void
  {
    I18n::setLocale('en');
    $res = UrlTool::url([\App\Model\Constant\Language::class, 'foo'], 5, 6);
    // not a controller name, so first value becomes action
    $this->assertIsArray($res);
    $this->assertArrayHasKey('action', $res);
    // extra params should be appended
    $this->assertContains(5, array_values($res));
    $this->assertContains(6, array_values($res));
    $this->assertArrayHasKey('language', $res);
  }

  public function testNestedArrayFirstValueIsProcessedRecursively(): void
  {
    I18n::setLocale('en');
    $res = UrlTool::url([[\App\Controller\UsersController::class, 'edit'], 10]);
    $this->assertIsArray($res);
    $this->assertSame('users', $res['controller']);
    $this->assertSame('edit', $res['action']);
    $this->assertContains(10, array_values($res));
    $this->assertArrayHasKey('language', $res);
  }

  public function testProvidedPluginPrefixAndLanguageArePreserved(): void
  {
    I18n::setLocale('en');
    $input = [
      'plugin' => 'Blog',
      'prefix' => 'admin',
      'controller' => 'posts',
      'action' => 'index',
      'language' => 'nl'
    ];
    $res = UrlTool::url($input);
    $this->assertIsArray($res);
    $this->assertSame('Blog', $res['plugin']);
    $this->assertSame('admin', $res['prefix']);
    $this->assertSame('posts', $res['controller']);
    $this->assertSame('index', $res['action']);
    $this->assertSame('nl', $res['language']);
  }
}

