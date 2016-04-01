<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = ['name', 'description'];

    public function clients(){
        return $this->belongsToMany(Client::class);
    }
}
