<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductProviderFile extends Model
{
    protected $fillable = ['product_provider_id', 'name', 'extension', 'url_file'];
}