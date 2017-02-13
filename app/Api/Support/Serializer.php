<?php
namespace ImmediateSolutions\Api\Support;

use Illuminate\Contracts\Container\Container;
use ImmediateSolutions\Core\Document\Interfaces\DocumentPreferenceInterface;
use ImmediateSolutions\Core\Session\Entities\Session;
use ImmediateSolutions\Support\Api\AbstractSerializer;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
abstract class Serializer extends AbstractSerializer
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->session = $container->make(Session::class);
    }

    /**
     * @param string $uri
     * @return string
     */
    protected function url($uri)
    {
        /**
         * @var DocumentPreferenceInterface $preference
         */
        $preference = $this->container->make(DocumentPreferenceInterface::class);

        return $preference->getBaseUrl().$uri;
    }
}