<?php

namespace Agrosellers\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Agrosellers\User;

class ProductProvider extends Model
{
    protected $fillable = [
        'product_id', 'provider_id', 'price', 'location', 'available_quantity',
        'min_quantity', 'available', 'isValidate', 'isActive', 'taxes'
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
        return $this->hasMany(Offer::class);
    }
}
