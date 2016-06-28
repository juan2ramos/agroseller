<?php

namespace Agrosellers\Entities;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['url', 'text', 'isOpen', 'user_id'];
}
