<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;


class Feature extends Model
{
    protected $fillable = [
        'baling', 'size', 'weight', 'metering', 'material'
    ];
}
