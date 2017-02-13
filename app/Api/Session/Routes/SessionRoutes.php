<?php
namespace ImmediateSolutions\Api\Session\Routes;
use ImmediateSolutions\Api\Session\Controllers\SessionsController;
use ImmediateSolutions\Support\Routing\Router;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class SessionRoutes
{
    public function __invoke(Router $router)
    {
        $router->post('/sessions', SessionsController::class.'@store');
        $router->post('/sessions/{sessionId}/refresh', SessionsController::class.'@refresh');
        $router->get('/sessions/{sessionId}', SessionsController::class.'@show');
        $router->delete('/sessions/{sessionId}', SessionsController::class.'@destroy');
    }
}