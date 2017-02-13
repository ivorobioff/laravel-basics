<?php
namespace ImmediateSolutions\Api\Support;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use ImmediateSolutions\Core\Session\Entities\Session;
use ImmediateSolutions\Core\Session\Services\SessionService;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class SessionFactory
{
    /**
     * @param Container $container
     * @return Session
     */
    public function __invoke(Container $container)
    {
        /**
         * @var Request $request
         */
        $request = $container->make(Request::class);

        $token = $request->header('Token')[0] ?? null;

        if (!$token){
            return new Session();
        }

        /**
         * @var SessionService $sessionService
         */
        $sessionService = $container->make(SessionService::class);

        return ($sessionService->getNotExpiredByToken($token) ?? new Session());
    }
}