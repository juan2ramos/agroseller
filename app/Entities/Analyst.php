<?php

namespace Agrosellers\Entities;
use Agrosellers\User;
use Illuminate\Database\Eloquent\Model;

class Analyst extends Model
{
    protected $fillable = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
