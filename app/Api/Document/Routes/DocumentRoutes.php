<?php
namespace ImmediateSolutions\Api\Document\Routes;
use Illuminate\Routing\Router;
use ImmediateSolutions\Api\Document\Controllers\DocumentsController;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class DocumentRoutes
{
    public function __invoke(Router $router)
    {
        $router->post('/documents', DocumentsController::class.'@store');
    }
}