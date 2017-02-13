<?php
namespace ImmediateSolutions\Infrastructure;
use Illuminate\Contracts\Container\Container;
use ImmediateSolutions\Core\Document\Interfaces\DocumentPreferenceInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class DocumentPreference implements DocumentPreferenceInterface
{
    /**
     * @var Container
     */
    private $config;

    /**
     * @param Container $config
     */
    public function __construct(Container $config)
    {
        $this->config = $config;
    }

    /**
     * @return int
     */
    public function getLifeTime()
    {
        return 10; //minutes
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->config->get('base_url');
    }
}