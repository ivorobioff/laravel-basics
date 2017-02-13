<?php
namespace ImmediateSolutions\Infrastructure;

use ImmediateSolutions\Core\Document\Interfaces\DocumentPreferenceInterface;
use ImmediateSolutions\Core\Document\Interfaces\StorageInterface;
use ImmediateSolutions\Core\Session\Interfaces\SessionPreferenceInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class InfrastructureServiceProvider extends \ImmediateSolutions\Support\Infrastructure\InfrastructureServiceProvider
{
    public function register()
    {
        parent::register();

        $this->app->singleton(StorageInterface::class, Storage::class);
        $this->app->singleton(SessionPreferenceInterface::class, SessionPreference::class);
        $this->app->singleton(DocumentPreferenceInterface::class, DocumentPreference::class);
    }
}