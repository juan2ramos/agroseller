<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductFile extends Model{
    
    protected $fillable = [
        'name', 'extension', 'url_file', 'product_id'
    ];

    public function product(){
    	return $this->belongsTo(Product::class);
    }

}
