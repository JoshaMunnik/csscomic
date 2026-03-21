<?php

declare(strict_types=1);

namespace App\View\Helper;

use App\View\Helper\Styling\ButtonHelper;
use App\View\Helper\Styling\DialogHelper;
use App\View\Helper\Styling\LayoutHelper;
use App\View\Helper\Styling\TableHelper;
use App\View\Helper\Styling\TextHelper;
use Cake\View\Helper;

/**
 * StylingHelper facade that exposes styling-related helpers located under
 * `src/View/Helper/Styling/`.
 *
 * @property ButtonHelper $Button
 * @property TextHelper $Text
 * @property TableHelper $Table
 * @property LayoutHelper $Layout
 * @property DialogHelper $Dialog
 */
class StylingHelper extends Helper
{
  protected array $helpers = [
    'Button'  => ['className' => ButtonHelper::class],
    'Text' => ['className' => TextHelper::class],
    'Table'  => ['className' => TableHelper::class],
    'Layout'  => ['className' => LayoutHelper::class],
    'Dialog' => ['className' => DialogHelper::class],
  ];
}
