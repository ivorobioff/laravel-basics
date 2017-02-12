<?php
namespace ImmediateSolutions\Core\Document\Interfaces;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
interface StorageInterface
{
    /**
     * @param FileInterface $file
     * @param string $uri
     */
    public function move(FileInterface $file, $uri);

    /**
     * @param string|array $uri
     */
    public function delete($uri);
}