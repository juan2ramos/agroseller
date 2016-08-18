<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class PlanProvider extends Model
{
    protected $fillable = ['provider_id', 'name', 'description', 'period', 'price', 'isActive'];

    function providers(){
        return $this->hasMany(Provider::class);
    }
}
