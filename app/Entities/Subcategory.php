<?php

namespace Agrosellers\Entities;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name','categories_id'];

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}
