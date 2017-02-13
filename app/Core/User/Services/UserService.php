<?php
namespace ImmediateSolutions\Core\User\Services;

use ImmediateSolutions\Core\Session\Entities\Session;
use ImmediateSolutions\Core\Support\Service;
use ImmediateSolutions\Core\User\Entities\User;
use ImmediateSolutions\Support\Core\Interfaces\PasswordEncryptorInterface;
use ImmediateSolutions\Core\User\Payloads\CredentialsPayload;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class UserService extends Service
{
    /**
     * @param string $username
     * @return bool
     */
    public function existsByUsername($username)
    {
        return $this->entityManager
            ->getRepository(User::class)
            ->exists(['username' => trim($username)]);
    }

    /**
     * @param CredentialsPayload $payload
     * @return bool
     */
    public function canAuthorize(CredentialsPayload $payload)
    {
        return (bool) $this->getAuthorized($payload);
    }

    /**
     * @param CredentialsPayload $payload
     * @return User
     */
    public function getAuthorized(CredentialsPayload $payload)
    {
        /**
         * @var User $user
         */
        $user = $this->entityManager->getRepository(User::class)
            ->findOneBy(['username' => $payload->getUsername()]);

        if (!$user){
            return null;
        }

        /**
         * @var PasswordEncryptorInterface $encryptor
         */
        $encryptor = $this->container->get(PasswordEncryptorInterface::class);

        if (!$encryptor->verify($payload->getPassword(), $user->getPassword())){
            return null;
        }

        return $user;
    }

    /**
     * @param int $userId
     * @param int $sessionId
     * @return bool
     */
    public function hasSession($userId, $sessionId)
    {
        return $this->entityManager->getRepository(Session::class)
            ->exists(['user' => $userId, 'id' => $sessionId]);
    }
}