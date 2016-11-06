<?php

namespace Agrosellers\Entities;

use Agrosellers\User;
use Elasticquent\ElasticquentTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'price', 'location', 'available_quantity', 'available',
        'isValidate', 'isActive'
    ];

    /*protected $mappingProperties = [
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'farms' => [
            'type' => 'string'
        ],
        'location' => [
            'type' => 'geo_point'
        ],

    ];
    */

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function getCreatedProductAttribute(){
        return Carbon::now()->diffInDays($this->created_at);
    }

    public function productProviders(){
        return $this->hasMany(ProductProvider::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function budgets(){
        return $this->belongsToMany(Budget::class)->withPivot('quantity');
    }
}


