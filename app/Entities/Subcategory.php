<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name','categories_id'];
}