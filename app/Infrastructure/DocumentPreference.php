<?php
namespace ImmediateSolutions\Infrastructure;

use ImmediateSolutions\Core\Document\Interfaces\DocumentPreferenceInterface;
use Illuminate\Config\Repository as Config;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class DocumentPreference implements DocumentPreferenceInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
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