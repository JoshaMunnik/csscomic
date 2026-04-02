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
    $httpUrl = 'http://example.com/path';
    $httpsUrl = 'HTTPS://example.com/other';

    $this->assertSame($httpUrl, UrlTool::url($httpUrl));
    $this->assertSame($httpsUrl, UrlTool::url($httpsUrl));
  }

  public function testArrayWithControllerAndActionIsProcessed(): void
  {
    I18n::setLocale('en');
    $result = UrlTool::url(['UsersController', 'edit', 1]);

    $this->assertIsArray($result);
    $this->assertArrayHasKey('controller', $result);
    $this->assertArrayHasKey('action', $result);
    $this->assertSame('users', $result['controller']);
    $this->assertSame('edit', $result['action']);
    // parameter preserved
    $this->assertContains(1, array_values($result));
    // language added
    $this->assertArrayHasKey('language', $result);
    $this->assertSame(Language::DEFAULT_CODE, $result['language']);
  }

  public function testControllerNameWithFQNIsDasherized(): void
  {
    $controllerName = UrlTool::controllerName('App\\Controller\\SomeThingController');
    $this->assertSame('some-thing', $controllerName);

    $controllerName2 = UrlTool::controllerName('UsersController');
    $this->assertSame('users', $controllerName2);
  }

  public function testReturnsEarlyWhenControllerAndActionArePresent(): void
  {
    I18n::setLocale('en');
    $inputRoute = ['controller' => 'users', 'action' => 'index'];
    $result = UrlTool::url($inputRoute);
    // should return array with controller and action preserved, and language added
    $this->assertIsArray($result);
    $this->assertSame('users', $result['controller']);
    $this->assertSame('index', $result['action']);
    $this->assertArrayHasKey('language', $result);
  }

  public function testNonHttpStringIsTreatedAsActionAndLanguageAdded(): void
  {
    I18n::setLocale('en');
    $result = UrlTool::url('/some/path');
    $this->assertIsArray($result);
    $this->assertArrayHasKey('action', $result);
    $this->assertSame('/some/path', $result['action']);
    $this->assertArrayHasKey('language', $result);
  }

  public function testVariadicParametersAreAppended(): void
  {
    I18n::setLocale('en');
    $result = UrlTool::url([\App\Model\Constant\Language::class, 'foo'], 5, 6);
    // not a controller name, so first value becomes action
    $this->assertIsArray($result);
    $this->assertArrayHasKey('action', $result);
    // extra params should be appended
    $this->assertContains(5, array_values($result));
    $this->assertContains(6, array_values($result));
    $this->assertArrayHasKey('language', $result);
  }

  public function testNestedArrayFirstValueIsProcessedRecursively(): void
  {
    I18n::setLocale('en');
    $result = UrlTool::url([[\App\Controller\UsersController::class, 'edit'], 10]);
    $this->assertIsArray($result);
    $this->assertSame('users', $result['controller']);
    $this->assertSame('edit', $result['action']);
    $this->assertContains(10, array_values($result));
    $this->assertArrayHasKey('language', $result);
  }

  public function testProvidedPluginPrefixAndLanguageArePreserved(): void
  {
    I18n::setLocale('en');
    $inputRoute = [
      'plugin' => 'Blog',
      'prefix' => 'admin',
      'controller' => 'posts',
      'action' => 'index',
      'language' => 'nl'
    ];
    $result = UrlTool::url($inputRoute);
    $this->assertIsArray($result);
    $this->assertSame('Blog', $result['plugin']);
    $this->assertSame('admin', $result['prefix']);
    $this->assertSame('posts', $result['controller']);
    $this->assertSame('index', $result['action']);
    $this->assertSame('nl', $result['language']);
  }
}

