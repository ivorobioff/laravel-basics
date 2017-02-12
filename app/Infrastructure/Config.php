<?php
namespace ImmediateSolutions\Infrastructure;
use ImmediateSolutions\ConfigProvider;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class Config implements ConfigInterface
{
    /**
     * @var array
     */
    private $source = [];

    /**
     * @param ConfigProvider $provider
     */
    public function __construct(ConfigProvider $provider)
    {
        $this->source = $provider->getConfig();
    }

    /**
     * @param string $path
     * @param mixed $default
     * @return null
     */
    public function get($path, $default = null)
    {
        return array_get($this->source, $path, $default);
    }

    /**
     * @param string $path
     * @return bool
     */
    public function has($path)
    {
        return array_has($this->source, $path);
    }
}