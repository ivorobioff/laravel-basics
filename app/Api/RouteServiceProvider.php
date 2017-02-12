<?php
namespace ImmediateSolutions\Api;
use Illuminate\Routing\Router;
use ImmediateSolutions\Api\Document\Routes\DocumentRoutes;
use ImmediateSolutions\Api\Session\Routes\SessionRoutes;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{
    public function map(Router $router)
    {
        $router->get('/', function(){
            return 'You have reached the web service v1.0!';
        });

        (new SessionRoutes())($router);
        (new DocumentRoutes())($router);
    }
}