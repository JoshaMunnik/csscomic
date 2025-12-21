<?php

use App\Controller\AccountController;
use App\Controller\HomeController;
use App\Model\Constant\Language;
use App\Tool\UrlTool;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
 * So you can use `$this` to reference the application class instance
 * if required.
 */
return function (RouteBuilder $routes): void {
  /*
   * The default class to use for all routes
   *
   * The following route classes are supplied with CakePHP and are appropriate
   * to set as the default:
   *
   * - Route
   * - InflectedRoute
   * - DashedRoute
   *
   * If no call is made to `Router::defaultRouteClass()`, the class used is
   * `Route` (`Cake\Routing\Route\Route`)
   *
   * Note that `Route` does not do any inflections on URLs which will result in
   * inconsistently cased URLs when used with `{plugin}`, `{'.UrlTool::CONTROLLER.'}` and
   * `{'.UrlTool::ACTION.'}` markers.
   */
  $routes->setRouteClass(DashedRoute::class);
  $routes
    ->connect(
      '/',
      [
        UrlTool::CONTROLLER => HomeController::controllerName(),
        UrlTool::ACTION => HomeController::INDEX[1],
        UrlTool::LANGUAGE => Language::DEFAULT_CODE,
      ],
    );
  $routes
    ->connect(
      '/{'.UrlTool::LANGUAGE.'}',
      [
        UrlTool::CONTROLLER => HomeController::controllerName(),
        UrlTool::ACTION => HomeController::INDEX[1],
      ],
    )
    ->setPatterns(
      [UrlTool::LANGUAGE => Language::getRegExp()],
    );
  $routes
    ->connect(
      '/login',
      [
        UrlTool::CONTROLLER => AccountController::controllerName(),
        UrlTool::ACTION => AccountController::LOGIN[1],
        UrlTool::LANGUAGE => Language::DEFAULT_CODE,
      ],
    );
  $routes
    ->connect(
      '/logout',
      [
        UrlTool::CONTROLLER => AccountController::controllerName(),
        UrlTool::ACTION => AccountController::LOGOUT[1],
        UrlTool::LANGUAGE => Language::DEFAULT_CODE,
      ],
    );
  $routes
    ->connect(
      '/{'.UrlTool::LANGUAGE.'}/{'.UrlTool::CONTROLLER.'}',
      [
        UrlTool::ACTION => 'index',
      ],
    )
    ->setPatterns(
      [UrlTool::LANGUAGE => Language::getRegExp()],
    );
  $routes
    ->connect(
      '/{'.UrlTool::LANGUAGE.'}/{'.UrlTool::CONTROLLER.'}/{'.UrlTool::ACTION.'}/*',
    )
    ->setPatterns(
      [UrlTool::LANGUAGE => Language::getRegExp()],
    );
  $routes
    ->connect(
      '/{'.UrlTool::CONTROLLER.'}',
      [
        UrlTool::ACTION => 'index',
        UrlTool::LANGUAGE => Language::DEFAULT_CODE,
      ],
    );
  $routes
    ->connect(
      '/{'.UrlTool::CONTROLLER.'}/{'.UrlTool::ACTION.'}/*',
      [
        UrlTool::LANGUAGE => Language::DEFAULT_CODE,
      ]
    );
  $routes->fallbacks();
};
