<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['description', 'name_client', 'identification_client', 'address_client', 'phone_client', 'user_id', 'state_order_id'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}





