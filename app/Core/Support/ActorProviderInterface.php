<?php
namespace ImmediateSolutions\Core\Support;
use ImmediateSolutions\Core\User\Entities\User;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
interface ActorProviderInterface
{
    /**
     * @return User
     */
    public function getActor();
}