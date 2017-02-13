<?php
namespace ImmediateSolutions\Core\Client\Services;
use ImmediateSolutions\Core\Client\Entities\Client;
use ImmediateSolutions\Core\Client\Payloads\ClientPayload;
use ImmediateSolutions\Core\Client\Validation\ClientValidator;
use ImmediateSolutions\Core\Support\Service;
use ImmediateSolutions\Support\Core\Interfaces\PasswordEncryptorInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ClientService extends Service
{
    /**
     * @param int $id
     * @return Client
     */
    public function get($id)
    {
        return $this->entityManager->find(Client::class, $id);
    }

    /**
     * @param ClientPayload $payload
     * @return Client
     */
    public function create(ClientPayload $payload)
    {
        $client = new Client();

        (new ClientValidator($this->container))->validate($payload);

        $this->exchange($payload, $client);

        $this->entityManager->persist($client);
        $this->entityManager->flush();

        return $client;
    }

    /**
     * @param int $id
     * @param ClientPayload $payload
     */
    public function update($id, ClientPayload $payload)
    {
        /**
         * @var Client $client
         */
        $client = $this->entityManager->find(Client::class, $id);

        (new ClientValidator($this->container, $client))->validate($payload, true);

        $this->exchange($payload, $client);

        $this->entityManager->flush();
    }

    /**
     * @param ClientPayload $payload
     * @param Client $client
     */
    private function exchange(ClientPayload $payload, Client $client)
    {
        $this->transfer($payload, $client, 'password', function($password){

            /**
             * @var PasswordEncryptorInterface $encryptor
             */
            $encryptor = $this->container->get(PasswordEncryptorInterface::class);

            return $encryptor->encrypt($password);
        });

        $this->transfer($payload, $client, 'firstName');
        $this->transfer($payload, $client, 'lastName');
        $this->transfer($payload, $client, 'email');
    }

    /**
     * @param int $id
     */
    public function delete($id)
    {
        /**
         * @var Client $client
         */
        $client = $this->entityManager->getReference(Client::class, $id);

        $this->entityManager->remove($client);

        $this->entityManager->flush();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function exists($id)
    {
        return $this->entityManager->getRepository(Client::class)->exists(['id' => $id]);
    }
}