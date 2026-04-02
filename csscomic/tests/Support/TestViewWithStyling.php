<?php

namespace App\Test\Support;

use App\View\Helper\StylingHelper;

/**
 * @property StylingHelper $Styling
 */
class TestViewWithStyling extends TestView
{
  public function __construct($url = '/')
  {
    parent::__construct($url);
    $this->loadHelper('Styling');
  }
}
