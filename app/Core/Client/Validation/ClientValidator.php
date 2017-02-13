<?php
namespace ImmediateSolutions\Core\Client\Validation;
use ImmediateSolutions\Core\Client\Entities\Client;
use ImmediateSolutions\Core\Client\Services\ClientService;
use ImmediateSolutions\Core\User\Services\UserService;
use ImmediateSolutions\Core\User\Validation\Rules\Unique;
use ImmediateSolutions\Support\Core\Interfaces\ContainerInterface;
use ImmediateSolutions\Support\Validation\AbstractThrowableValidator;
use ImmediateSolutions\Support\Validation\Binder;
use ImmediateSolutions\Support\Validation\Property;
use ImmediateSolutions\Support\Validation\Rules\Blank;
use ImmediateSolutions\Support\Validation\Rules\Email;
use ImmediateSolutions\Support\Validation\Rules\Length;
use ImmediateSolutions\Support\Validation\Rules\Obligate;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ClientValidator extends AbstractThrowableValidator
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var ClientService
     */
    private $clientService;

    /**
     * @var Client
     */
    private $currentClient;

    /**
     * @param ContainerInterface $container
     * @param Client $currentClient
     */
    public function __construct(ContainerInterface $container, Client $currentClient = null)
    {
        $this->userService = $container->get(UserService::class);
        $this->clientService = $container->get(ClientService::class);
        $this->currentClient = $currentClient;
    }

    /**
     * @param Binder $binder
     * @return void
     */
    protected function define(Binder $binder)
    {
        $binder->bind('email', function(Property $property){
            $property
                ->addRule(new Obligate())
                ->addRule(new Email())
                ->addRule((new Unique($this->userService, $this->currentClient))
                    ->setMessage('An user with this email address is already registered.'));
        });


        $binder->bind('password', function(Property $property){
            $property
                ->addRule(new Obligate())
                ->addRule(new Length(6));
        });

        $binder->bind('firstName', function(Property $property){
            $property
                ->addRule(new Obligate())
                ->addRule(new Blank())
                ->addRule(new Length(0, 255));
        });

        $binder->bind('lastName', function(Property $property){
            $property
                ->addRule(new Obligate())
                ->addRule(new Blank())
                ->addRule(new Length(0, 255));
        });
    }
}