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

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function files(){
        return $this->belongsToMany(File::class);
    }

    public function taxes(){
        return $this->belongsToMany(Tax::class);
    }
}
