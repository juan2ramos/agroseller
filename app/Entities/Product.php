<?php

namespace Agrosellers\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable =
        [
            'location','presentation','size','weight','measure','material','description','user_id','subcategory_id',
            'forms_employment', 'price','taxes','available_quantity','image_scale','offer_price','offer_on','offer',
            'offer_off','image_scale','name','slug','composition','important_offer'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function offers(){
        return $this->hasOne(Offer::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    public function budgets(){
        return $this->belongsToMany(Budget::class)->withPivot('quantity');
    }

    public function productFiles(){
        return $this->hasMany(ProductFile::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
<<<<<<< HEAD

    public function getCreatedProductAttribute()
    {
        return Carbon::now()->diffInDays($this->created_at);
=======
    public function provider(){
        return $this->belongsTo(Provider::class);
>>>>>>> fe32bc3968cb7f115eca53060bce25cac19dc0ab
    }
}


