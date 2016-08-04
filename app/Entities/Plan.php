<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'description', 'features', 'slug'];

    function planPrices(){
        return $this->hasMany(PlanPrice::class);
    }
}
