<?php
namespace ImmediateSolutions\Api\Support;
use ImmediateSolutions\Core\Session\Entities\Session;
use ImmediateSolutions\Core\Support\ActorProviderInterface;
use ImmediateSolutions\Core\User\Entities\User;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ActorProvider implements ActorProviderInterface
{
    /**
     * @var Session $session
     */
    private $session;

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @return User
     */
    public function getActor()
    {
        return $this->session->getUser();
    }
}