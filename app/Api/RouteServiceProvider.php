<?php
namespace ImmediateSolutions\Api;
use ImmediateSolutions\Api\Document\Routes\DocumentRoutes;
use ImmediateSolutions\Api\Session\Routes\SessionRoutes;
use ImmediateSolutions\Support\Routing\Router as Proxy;
use ImmediateSolutions\Support\Routing\Router;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{
    /**
     * @param Router $proxy
     */
    private function define(Proxy $proxy)
    {
        (new SessionRoutes())($proxy);
        (new DocumentRoutes())($proxy);
    }

    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->get('/', function(){
            return 'You have reached the web service v1.0!';
        });

        /**
         * @var Proxy $proxy
         */
        $proxy = $this->app->make(Proxy::class);
        $proxy->setAliases($this->app->make('config')->get('app.routing.patterns', []));

        $this->define($proxy);

        // get the original collection of routes
        $routes = $router->getRoutes();

        // transfer all routes from proxy router to the original router
        foreach ($proxy->getRoutes() as $route) {
            $routes->add($route);
        }

        // re-initialize the original collection of routes
        $router->setRoutes($routes);
    }
}