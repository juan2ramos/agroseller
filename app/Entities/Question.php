<?php

namespace Agrosellers\Entities;
use Agrosellers\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id', 'product_id', 'isResponded'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function texts(){
        return $this->hasMany(Text::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
