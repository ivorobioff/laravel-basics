<?php
namespace ImmediateSolutions\Api\Support;
use ImmediateSolutions\Core\Document\Payloads\IdentifierPayload;
use Closure;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
abstract class Processor extends \ImmediateSolutions\Support\Api\Processor
{
    /**
     * @return Closure
     */
    public function asDocument()
    {
        return function($value){
            if ($value === null){
                return null;
            }

            if (is_array($value)){
                return new IdentifierPayload($value['id'], $value['token']);
            }

            return new IdentifierPayload($value);
        };
    }

    /**
     * @return Closure
     */
    public function asDocuments()
    {
        return function($data) {

            if ($data === null){
                return null;
            }

            return array_map($this->asDocument(), $data);
        };
    }
}