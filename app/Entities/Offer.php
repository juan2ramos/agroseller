<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['product_id','offer_description','offer_price','offer_on','offer_off', 'important_offer'];

    public function product(){
        return $this->belongsTo(ProductProvider::class);
    }
}
