<?php
namespace ImmediateSolutions\Api\Document\Routes;
use ImmediateSolutions\Api\Document\Controllers\DocumentsController;
use ImmediateSolutions\Support\Routing\Router;

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