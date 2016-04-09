<?php
/**
 * Created by PhpStorm.
 * User: juan2ramos
 * Date: 6/01/16
 * Time: 10:48 AM
 */

namespace Agrosellers\Repositories;


abstract class BaseRepository
{
    /**
     * @return \Agrosellers\Entities\Entity
     */
    abstract public function getModel();

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return $this->getModel()->newQuery();
    }

    public function findOrFail($id)
    {
        return $this->newQuery()->findOrFail($id);
    }

}