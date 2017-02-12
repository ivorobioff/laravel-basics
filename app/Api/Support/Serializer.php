<?php
namespace ImmediateSolutions\Api\Support;

use DateTime;
use Illuminate\Contracts\Container\Container;
use ImmediateSolutions\Core\Document\Interfaces\DocumentPreferenceInterface;
use ImmediateSolutions\Core\Session\Entities\Session;
use ImmediateSolutions\Support\Other\Enum;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
abstract class Serializer
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->session = $container->get(Session::class);
    }

    /**
     * @param string $serializer
     * @param object $object
     * @param $initializer
     */
    protected function delegate($serializer, $object, callable $initializer = null)
    {
        $serializer = $this->container->get($serializer);

        if ($initializer){
            $initializer($serializer);
        }

        return $serializer($object);
    }

    protected function url($uri)
    {
        /**
         * @var DocumentPreferenceInterface $preference
         */
        $preference = $this->container->get(DocumentPreferenceInterface::class);

        return $preference->getBaseUrl().$uri;
    }

    /**
     * @param DateTime $datetime
     * @return string
     */
    protected function datetime(DateTime $datetime = null)
    {
        if ($datetime === null){
            return $datetime;
        }

        return $datetime->format(DateTime::ATOM);
    }

    /**
     * @param Enum $enum
     * @return string|integer
     */
    protected function enum(Enum $enum = null)
    {
        if ($enum === null){
            return $enum;
        }

        return $enum->value();
    }
}