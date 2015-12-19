<?php

namespace Agrosellers\Entities;
class Category extends Entity
{
    protected $table = 'categories';
    protected $fillable = ['name'];
}