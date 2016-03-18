<?php

namespace Agrosellers\Entities;

use Agrosellers\User;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function providers(){
        return $this->hasMany(Provider::class);
    }
}
