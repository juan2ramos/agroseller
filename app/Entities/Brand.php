<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'product_provider_id', 'name',
        'logo', 'description'
    ];

    public function productProvider(){
        $this->hasOne(ProductProvider::class);
    }
}
