<?php

namespace Agrosellers\Entities;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name','categories_id', 'url_image','slug'];

    public function features(){
        return $this->belongsToMany(Feature::class);
    }

    public function featuresName(){
        return $this->belongsToMany(Feature::class)->get(['name']);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function getProductsPublicAttribute(){
        return $this->products()->where('status', 'public');
    }

}
