<?php
namespace ImmediateSolutions\Infrastructure\DAL\Client\Metadata;
use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use ImmediateSolutions\Support\Infrastructure\Doctrine\Metadata\AbstractMetadataProvider;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ClientMetadata extends AbstractMetadataProvider
{
    /**
     * @param ClassMetadataBuilder $builder
     * @return void
     */
    public function define(ClassMetadataBuilder $builder)
    {
        $builder
            ->createField('firstName', 'string')
            ->build();

        $builder
            ->createField('lastName', 'string')
            ->build();


        $builder
            ->createField('email', 'string')
            ->unique(true)
            ->build();
    }
}