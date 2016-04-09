<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
