<?php
namespace ImmediateSolutions\Api\Client\Routes;
use ImmediateSolutions\Api\Client\Controllers\ClientsController;
use ImmediateSolutions\Support\Routing\Router;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ClientRoutes
{
    public function __invoke(Router $router)
    {
        $router->post('/clients', ClientsController::class.'@store');
        $router->get('/clients/{clientId}', ClientsController::class.'@show');
        $router->patch('/clients/{clientId}', ClientsController::class.'@update');
        $router->delete('/clients/{clientId}', ClientsController::class.'@destroy');
    }
}