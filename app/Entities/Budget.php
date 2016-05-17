<?php

namespace Agrosellers\Entities;

use Agrosellers\User;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
