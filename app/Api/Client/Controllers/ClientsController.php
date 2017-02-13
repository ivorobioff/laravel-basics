<?php
namespace ImmediateSolutions\Api\Client\Controllers;
use Illuminate\Http\Response;
use ImmediateSolutions\Api\Client\Processors\ClientsProcessor;
use ImmediateSolutions\Api\Client\Serializers\ClientSerializer;
use ImmediateSolutions\Api\Support\Controller;
use ImmediateSolutions\Core\Client\Services\ClientService;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ClientsController extends Controller
{
    /**
     * @var ClientService
     */
    private $clientService;

    /**
     * @param ClientService $clientService
     */
    public function initialize(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * @param ClientsProcessor $processor
     * @return Response
     */
    public function store(ClientsProcessor $processor)
    {
        return $this->reply->single(
            $this->clientService->create($processor->createPayload()),
            $this->serializer(ClientSerializer::class)
        );
    }

    /**
     * @param int $clientId
     * @param ClientsProcessor $processor
     * @return Response
     */
    public function update($clientId, ClientsProcessor $processor)
    {
        $this->clientService->update($clientId, $processor->createPayload());

        return $this->reply->blank();
    }

    /**
     * @param int $clientId
     * @return Response
     */
    public function show($clientId)
    {
        return $this->reply->single(
            $this->clientService->get($clientId),
            $this->serializer(ClientSerializer::class)
        );
    }

    /**
     * @param int $clientId
     * @return Response
     */
    public function destroy($clientId)
    {
        $this->clientService->delete($clientId);

        return $this->reply->blank();
    }

    /**
     * @param int $clientId
     * @return bool
     */
    public function verify($clientId)
    {
        return $this->clientService->exists($clientId);
    }
}