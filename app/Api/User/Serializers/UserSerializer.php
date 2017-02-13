<?php
namespace ImmediateSolutions\Api\User\Serializers;
use ImmediateSolutions\Api\Support\Serializer;
use ImmediateSolutions\Core\User\Entities\User;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class UserSerializer extends Serializer
{
    /**
     * @param User $user
     * @return array
     */
    public function __invoke(User $user)
    {
        return [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'createdAt' => $this->datetime($user->getCreatedAt())
        ];
    }
}