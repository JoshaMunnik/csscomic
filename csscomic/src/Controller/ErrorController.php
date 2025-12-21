<?php
declare(strict_types=1);

namespace App\Controller;

use App\Lib\Controller\ApplicationControllerBase;
use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Http\Response;

/**
 * Error Handling Controller
 *
 * Controller used by ExceptionRenderer to render error responses.
 */
class ErrorController extends ApplicationControllerBase
{
    /**
     * @param EventInterface<Controller> $event Event.
     * @return void
     */
    public function beforeRender(EventInterface $event): void
    {
      parent::beforeRender($event);
      $this->viewBuilder()->setTemplatePath('Error');
    }
}
