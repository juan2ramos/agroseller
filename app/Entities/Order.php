<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['description', 'client_id'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
