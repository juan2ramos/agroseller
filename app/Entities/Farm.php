<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = ['name', 'description', 'farm_category_id'];

    public function clients(){
        return $this->belongsToMany(Client::class);
    }

    public function farmCategory(){
        return $this->belongsTo(FarmCategory::class);
    }
}
