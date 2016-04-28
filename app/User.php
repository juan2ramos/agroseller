<?php

namespace Agrosellers;
use Gbrock\Table\Traits\Sortable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Agrosellers\Entities\Administrator;
use Agrosellers\Entities\Agent;
use Agrosellers\Entities\Analyst;
use Agrosellers\Entities\Client;
use Agrosellers\Entities\Provider;
use Agrosellers\Entities\Question;
use Agrosellers\Entities\Role;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use Sortable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $sortable = ['name', 'role_id', 'created_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'role_id','mobile_phone'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public function administrator(){
        return $this->hasOne(Administrator::class);
    }

    public function agent(){
        return $this->hasOne(Agent::class);
    }

    public function analyst(){
        return $this->hasOne(Analyst::class);
    }

    public function client(){
        return $this->hasOne(Client::class);
    }

    public function provider()
    {
        return $this->hasOne(Provider::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function fullName(){
        return $this->name . ' ' . $this->last_name;
    }
}
