<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $fillable = ['name','url_image'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class,'categories_id');
    }

}
