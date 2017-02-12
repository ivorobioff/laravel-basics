<?php
namespace ImmediateSolutions\Core\Document\Interfaces;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
interface FileInterface
{
    /**
     * @return string
     */
    public function getSize();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getMediaType();

    /**
     * @return string|resource
     */
    public function getLocation();

    /**
     * @return mixed
     */
    public function getError();
}