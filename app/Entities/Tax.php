<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = ['name', 'percent'];
}
