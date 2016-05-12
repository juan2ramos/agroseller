<?php

namespace Agrosellers\Entities;
use Illuminate\Database\Eloquent\Model;
use Agrosellers\User;

class Text extends Model
{
    protected $fillable = ['question_id', 'description'];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
