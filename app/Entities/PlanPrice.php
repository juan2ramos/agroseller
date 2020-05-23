<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class PlanPrice extends Model
{
    protected $fillable = ['plan_id', 'period', 'price'];

    function plan(){
        return $this->belongsTo(PlanPrice::class);
    }
}
