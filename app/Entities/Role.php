<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    function getNameAttribute(){
        return strtolower($this->attributes['name']);
    }
}
