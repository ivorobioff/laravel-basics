<?php
namespace ImmediateSolutions\Infrastructure;
use ImmediateSolutions\Core\Document\Interfaces\DocumentPreferenceInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class DocumentPreference implements DocumentPreferenceInterface
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
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