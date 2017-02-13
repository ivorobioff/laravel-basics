<?php
namespace ImmediateSolutions\Api\Session\Protectors;
use ImmediateSolutions\Api\Support\Protectors\AbstractOwnerProtector;
use ImmediateSolutions\Core\User\Services\UserService;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class OwnerProtector extends AbstractOwnerProtector
{
    /**
     * @param int $id
     * @return bool
     */
    protected function isOwner($id)
    {
        /**
         * @var UserService $userService
         */
        $userService = $this->container->make(UserService::class);

        return $userService->hasSession($this->session->getUser()->getId(), $id);
    }
}