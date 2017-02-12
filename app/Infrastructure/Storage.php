<?php
namespace ImmediateSolutions\Infrastructure;
use ImmediateSolutions\Core\Document\Interfaces\FileInterface;
use ImmediateSolutions\Core\Document\Interfaces\StorageInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class Storage implements StorageInterface
{
    /**
     * @param FileInterface $file
     * @param string $uri
     */
    public function move(FileInterface $file, $uri)
    {
        ///
    }

    /**
     * @param string|array $uri
     */
    public function delete($uri)
    {
        //
    }
}