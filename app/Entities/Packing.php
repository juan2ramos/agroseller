<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Packing extends Model
{
    protected $table = 'packing';
    protected $fillable = ['high','width','long','quantity'];

    public function productProvider(){
        return $this->belongsTo(ProductProvider::class);
    }

}
