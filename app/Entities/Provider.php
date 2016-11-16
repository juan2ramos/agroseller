<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;
use Agrosellers\User;

class Provider extends Model
{
    protected $fillable = [
        'company-name', 'location', 'address', 'contact', 'contact-phone',
        'description', 'NIT', 'url-video', 'sales-manager-name', 'licence',
        'dispatch-time', 'legal-agent', 'user_id', 'agent_id', 'logo',
        'nick-name', 'taxpayer', 'web-site', 'titular-name', 'bank-name',
        'bank-country', 'count-number', 'validate'
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function productProviders(){
        return $this->hasMany(ProductProvider::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class, 'product_providers')->withPivot('price', 'location','available_quantity','min_quantity');

    }
    
    public function planProvider(){
        return $this->hasMany(PlanProvider::class);
    }
}
