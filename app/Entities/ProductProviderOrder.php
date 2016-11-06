<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductProviderOrder extends Model
{
    protected $fillable = ['order_id', 'product_provider_id', 'quantity', 'state', 'value'];
}
