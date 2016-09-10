<?php

namespace Agrosellers\Entities;

use Agrosellers\User;
use Elasticquent\ElasticquentTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use ElasticquentTrait;

    protected $fillable =
        [
            'location','presentation','size','weight','measure','material','description','user_id','subcategory_id',
            'forms_employment', 'price','taxes','available_quantity','image_scale',
            'image_scale','name','slug','composition', 'isActive', 'isValidate', 'farms'];

    protected $mappingProperties = [
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'farms' => [
            'type' => 'string',
            "analyzer" => "stop",
            "stopwords" => [","]
        ],
        'location' => [
            'type' => 'geo_point',
            "analyzer" => "stop",
            "stopwords" => [ "and", "the" ]
        ],

    ];
    
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

    public function getCreatedProductAttribute()
    {
        return Carbon::now()->diffInDays($this->created_at);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}


