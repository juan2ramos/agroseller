<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable =
        [
            'location','presentation','size','weight','measure','material','description','user_id','subcategory_id',
            'forms-employment', 'price','taxes','available-quantity','image-scale','offer-price','offer-on','offer',
            'offer-off','image-scale','name','slug','composition',''];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }


}

