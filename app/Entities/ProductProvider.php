<?php

namespace Agrosellers\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Agrosellers\User;

class ProductProvider extends Model
{
    protected $fillable = [
        'product_id', 'provider_id', 'price', 'location', 'available_quantity',
        'min_quantity', 'available', 'isValidate', 'isActive','has_offer','youtube','link'
    ];

    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function files(){
        return $this->belongsToMany(File::class);
    }
    public function getTotalValueAttribute(){
        return $this->pivot->quantity * $this->price;
    }
    public function offer(){
        return $this->hasOne(Offer::class);
    }
    public function packing(){
        return $this->hasMany(Packing::class);
    }
    public function taxes(){
        return $this->belongsToMany(Tax::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    public function cities(){
        return $this->belongsToMany(City::class, 'city_product_providers');
    }
}
