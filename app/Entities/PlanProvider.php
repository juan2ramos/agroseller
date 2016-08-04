<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class PlanProvider extends Model
{
    function provider(){
        return $this->hasMany(Provider::class);
    }
}
