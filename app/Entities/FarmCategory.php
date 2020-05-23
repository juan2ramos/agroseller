<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class FarmCategory extends Model
{
    protected $fillable = ['name', 'description'];

    public function farms(){
        return $this->hasMany(Farm::class);
    }
}
