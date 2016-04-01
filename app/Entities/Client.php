<?php

namespace Agrosellers\Entities;

use Agrosellers\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function farms(){
        return $this->bolongsToMany(Farm::class);
    }
}
