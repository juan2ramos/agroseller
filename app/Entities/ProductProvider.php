<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductProvider extends Model
{
    protected $fillable = [
        'name', 'slug', 'presentation', 'size', 'subcategory_id',
        'product_id', 'weight', 'measure', 'provider_id', 'material',
        'description', 'composition', 'forms_employment', 'taxes', 
        'image_scale', 'farms'
    ];
}
