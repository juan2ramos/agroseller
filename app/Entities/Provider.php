<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;
use Agrosellers\Entities\Category;

class Provider extends Model
{
    protected $fillable = [
        'location', 'address', 'contact', 'contact-phone',
        'description', 'NIT', 'url-video','user_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
