<?php
namespace ImmediateSolutions\Api\Client\Processors;
use ImmediateSolutions\Api\Support\Processor;
use ImmediateSolutions\Core\Client\Payloads\ClientPayload;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ClientsProcessor extends Processor
{
    /**
     * @return array
     */
    protected function schema()
    {
        return [
            'firstName' => 'string',
            'lastName' => 'string',
            'email' => 'string',
            'password' => 'string'
        ];
    }

    /**
     * @return ClientPayload
     */
    public function createPayload()
    {
        $payload = new ClientPayload();

        $this->set($payload, 'firstName');
        $this->set($payload, 'lastName');
        $this->set($payload, 'email');
        $this->set($payload, 'password');

        return $payload;
    }
}