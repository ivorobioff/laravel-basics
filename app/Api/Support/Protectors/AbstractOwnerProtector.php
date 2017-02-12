<?php
namespace ImmediateSolutions\Api\Support\Protectors;
use Illuminate\Http\Request;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
abstract class AbstractOwnerProtector extends AuthProtector
{
    /**
     * @return bool
     */
    public function grants()
    {
        if (!parent::grants()){
            return false;
        }

        /**
         * @var Request $request
         */
        $request = $this->container->make(Request::class);

        $arguments = array_values($request->route()->parameters());

        if (!$arguments){
            return false;
        }

        $id = array_first($arguments);

        return $this->isOwner($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    abstract protected function isOwner($id);
}