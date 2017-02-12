<?php
namespace ImmediateSolutions\Api\User\Serializers;
use ImmediateSolutions\Api\Support\Serializer;
use ImmediateSolutions\Core\User\Entities\User;
use RuntimeException;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class UserByTypeSerializer extends Serializer
{
    public function __invoke(User $user)
    {
        throw new RuntimeException('Unable to find a serializer for the "'.get_class($user).'" type.');
    }
}