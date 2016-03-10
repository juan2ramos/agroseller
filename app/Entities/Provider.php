<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;
use Agrosellers\Entities\Category;

class Provider extends Model
{
    protected $fillable = [
        'company-name', 'location', 'address', 'contact', 'contact-phone',
        'description', 'NIT', 'url-video','user_id', 'sales-manager-name',
        'licence', 'dispatch-time', 'legal-agent', 'logo', 'taxpayer',
        'web-site', 'titular-name', 'bank-name','bank-country', 'count-number',
        'nick-name'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
