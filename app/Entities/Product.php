<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable =
        [
            'location','presentation','size','weight','measure','material','description','user_id','subcategory_id',
            'forms_employment', 'price','taxes','available_quantity','image_scale','offer_price','offer_on','offer',
            'offer_off','image_scale','name','slug','composition'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function productFiles(){
        return $this->hasMany(ProductFile::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}

