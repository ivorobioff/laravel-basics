<?php
namespace ImmediateSolutions\Infrastructure;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\ServiceProvider;
use ImmediateSolutions\Core\Document\Interfaces\DocumentPreferenceInterface;
use ImmediateSolutions\Core\Document\Interfaces\StorageInterface;
use ImmediateSolutions\Core\Session\Interfaces\SessionPreferenceInterface;
use ImmediateSolutions\Support\Core\Interfaces\ContainerInterface;
use ImmediateSolutions\Support\Core\Interfaces\TokenGeneratorInterface;
use ImmediateSolutions\Core\User\Interfaces\PasswordEncryptorInterface;
use ImmediateSolutions\Infrastructure\Doctrine\EntityManagerFactory;
use Psr\Log\LoggerInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class InfrastructureServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(EntityManagerInterface::class, function(){
            return (new EntityManagerFactory())($this->app);
        });

        $this->app->singleton(PasswordEncryptorInterface::class, PasswordEncryptor::class);
        $this->app->singleton(TokenGeneratorInterface::class, TokenGenerator::class);
        $this->app->singleton(StorageInterface::class, Storage::class);
        $this->app->singleton(SessionPreferenceInterface::class, SessionPreference::class);
        $this->app->singleton(DocumentPreferenceInterface::class, DocumentPreference::class);
        $this->app->singleton(ContainerInterface::class, Container::class);
        $this->app->singleton(LoggerInterface::class, function(){
            return $this->app->make('log');
        });
    }
}