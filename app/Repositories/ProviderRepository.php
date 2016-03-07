<?php
/**
 * Created by PhpStorm.
 * User: juan2ramos
 * Date: 6/01/16
 * Time: 10:55 AM
 */

namespace Agrosellers\Repositories;

use Agrosellers\Entities\Provider;

class ProviderRepository extends BaseRepository
{

    /**
     * @return \Agrosellers\Entities\Entity
     */
    public function getModel()
    {
       return new Provider();
    }

    function d(){
        $this->getModel()->newQuery();
    }
}