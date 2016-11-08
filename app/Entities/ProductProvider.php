<?php

namespace Agrosellers\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Agrosellers\User;

class ProductProvider extends Model
{
    protected $fillable = [
        'name', 'slug', 'presentation', 'size', 'subcategory_id',
        'product_id', 'weight', 'measure', 'provider_id', 'material',
        'description', 'composition', 'forms_employment', 'taxes', 
        'image_scale', 'farms'
    ];

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
