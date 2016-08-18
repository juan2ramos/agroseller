<?php

namespace Agrosellers\Entities;


use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class PlanProvider extends Model
{
    protected $fillable = ['provider_id', 'name', 'description', 'period', 'price', 'isActive'];

    function providers(){
        return $this->hasMany(Provider::class);
    }

    function getPricePlanAttribute(){

        return  number_format($this->price, 0, " ", ".") ;
    }

    public function getCreatedPlanAttribute()
    {
        $date = new Date($this->created_at);
        return $date->format('l j F Y');
    }
    public function getcuteDateAttribute(){
        $date = new Date($this->created_at);
        return $date->addMonths($this->period)->format('l j F Y');
    }
}
