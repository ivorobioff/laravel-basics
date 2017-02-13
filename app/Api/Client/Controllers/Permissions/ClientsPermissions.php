<?php
namespace ImmediateSolutions\Api\Client\Controllers\Permissions;
use ImmediateSolutions\Support\Permissions\AbstractActionsPermissions;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ClientsPermissions extends AbstractActionsPermissions
{
    /**
     * @return array
     */
    protected function permissions()
    {
        return [
            'store' => 'all',
            'show' => 'owner',
            'update' => 'owner',
            'destroy' => 'owner'
        ];
    }
}