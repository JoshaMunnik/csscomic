<?php

namespace App\Test\Support;

use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\View\View;

class TestView extends View
{
  public function __construct($url = '/')
  {
    parent::__construct(new ServerRequest(['url' => $url]), new Response());
  }
}
