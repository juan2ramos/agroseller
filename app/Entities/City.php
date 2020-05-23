<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function productProviders()
    {
        return $this->belongsToMany(ProductProvider::class);
    }

}
