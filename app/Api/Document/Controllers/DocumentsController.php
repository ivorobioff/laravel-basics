<?php
namespace ImmediateSolutions\Api\Document\Controllers;
use Illuminate\Http\Response;
use ImmediateSolutions\Api\Document\Processors\DocumentsProcessor;
use ImmediateSolutions\Api\Document\Serializers\DocumentSerializer;
use ImmediateSolutions\Api\Support\Controller;
use ImmediateSolutions\Core\Document\Services\DocumentService;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class DocumentsController extends Controller
{
    /**
     * @var DocumentService
     */
    private $documentService;

    /**
     * @param DocumentService $documentService
     */
    public function initialize(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    /**
     * @param DocumentsProcessor $processor
     * @return Response
     */
    public function store(DocumentsProcessor $processor)
    {
        $document = $this->documentService->create($processor->getFile());

        return $this->reply->single($document, $this->serializer(DocumentSerializer::class));
    }
}