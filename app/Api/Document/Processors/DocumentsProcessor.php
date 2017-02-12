<?php
namespace ImmediateSolutions\Api\Document\Processors;
use Illuminate\Http\UploadedFile;
use ImmediateSolutions\Api\Document\Support\File;
use ImmediateSolutions\Api\Support\Processor;
use ImmediateSolutions\Core\Document\Interfaces\FileInterface;
use ImmediateSolutions\Support\Validation\Error;
use ImmediateSolutions\Support\Validation\ErrorsThrowableCollection;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class DocumentsProcessor extends Processor
{
    public function validate()
    {
        if (!$this->request->file('document') instanceof UploadedFile){
            ErrorsThrowableCollection::throwError(
                'document', new Error('exists', 'The file has not been uploaded'));
        }
    }

    /**
     * @return FileInterface
     */
    public function getFile()
    {
        return new File($this->request->file('document'));
    }
}