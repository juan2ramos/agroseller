<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['description'];
/*
    public function products(){
        return $this->belongsToMany(Product::class);
    }*/
}
