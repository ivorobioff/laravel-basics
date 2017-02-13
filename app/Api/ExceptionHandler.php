<?php
namespace ImmediateSolutions\Api;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ExceptionHandler extends \ImmediateSolutions\Support\Api\ExceptionHandler
{
    /**
     * @return bool
     */
    protected function isDebug()
    {
        return $this->container->make('config')->get('app.debug', false);
    }
}