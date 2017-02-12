<?php
namespace ImmediateSolutions\Api\Support\Protectors;
use Illuminate\Contracts\Container\Container;
use ImmediateSolutions\Core\Session\Entities\Session;
use ImmediateSolutions\Support\Permissions\ProtectorInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class AuthProtector implements ProtectorInterface
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var Container
     */
    protected $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->session = $container->make(Session::class);
    }

    /**
     * @return bool
     */
    public function grants()
    {
        return $this->session->getId() !== null;
    }
}