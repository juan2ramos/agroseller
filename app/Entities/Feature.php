<?php

namespace Agrosellers\Entities;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name', 'rules'];

    public function subcategories(){
        return $this->belongsToMany(Subcategory::class);
    }
}
