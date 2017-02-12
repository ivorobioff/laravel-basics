<?php
namespace ImmediateSolutions\Api\Document\Support;
use Illuminate\Http\UploadedFile;
use ImmediateSolutions\Core\Document\Interfaces\FileInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class File implements FileInterface
{
    /**
     * @var UploadedFile
     */
    private $source;

    /**
     * @param UploadedFile $source
     */
    public function __construct(UploadedFile $source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->source->getClientSize();
    }

    /**
     * @return string
     */
    public function getName()
    {
       return $this->source->getClientOriginalName();
    }

    /**
     * @return string
     */
    public function getMediaType()
    {
        return $this->source->getClientMimeType();
    }

    /**
     * @return string|resource
     */
    public function getLocation()
    {
        return $this->source->getPathname();
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->source->getError();
    }
}