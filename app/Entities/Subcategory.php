<?php

namespace Agrosellers\Entities;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name','categories_id', 'url_image'];

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
