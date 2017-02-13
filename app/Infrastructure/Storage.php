<?php
namespace ImmediateSolutions\Infrastructure;

use Illuminate\Contracts\Container\Container;
use ImmediateSolutions\Core\Document\Interfaces\FileInterface;
use ImmediateSolutions\Core\Document\Interfaces\StorageInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class Storage implements StorageInterface
{
    /**
     * @var string
     */
    private $root;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->root = $container->make('config')->get('filesystems.disks.local.root');
    }

    /**
     * @param FileInterface $file
     * @param string $uri
     */
    public function move(FileInterface $file, $uri)
    {
        $path = $this->root.'/'.$uri;

        mkdir(dirname($path), 0755, true);

        move_uploaded_file($file->getLocation(), $path);
    }

    /**
     * @param string|array $uri
     */
    public function delete($uri)
    {
        if (!is_array($uri)){
            $uri = [$uri];
        }

        foreach ($uri as $path){
            unlink($this->root.'/'.$path);
        }
    }
}