<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;
use Agrosellers\User;

class Provider extends Model
{
    protected $fillable = [
        'company-name', 'location', 'address', 'contact', 'contact-phone',
        'description', 'NIT', 'url-video','user_id', 'sales-manager-name',
        'licence', 'dispatch-time', 'legal-agent', 'logo', 'taxpayer',
        'web-site', 'titular-name', 'bank-name','bank-country', 'count-number',
        'nick-name'
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
