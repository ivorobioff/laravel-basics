<?php
namespace ImmediateSolutions\Api;
use Illuminate\Support\ServiceProvider;
use ImmediateSolutions\Api\Support\ActorProvider;
use ImmediateSolutions\Api\Support\SessionFactory;
use ImmediateSolutions\Core\Session\Entities\Session;
use ImmediateSolutions\Core\Support\ActorProviderInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Session::class, function(){
            return (new SessionFactory())($this->app);
        });

        $this->app->singleton(ActorProviderInterface::class, ActorProvider::class);
    }
}