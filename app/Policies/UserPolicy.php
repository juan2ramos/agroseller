<?php

namespace Agrosellers\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Agrosellers\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function isRegisterProvider(){
        return $this->user->provider->NIT;
    }

    public function isValidateProvider(){
        return $this->user->role_id == 3 && $this->user->provider->validate == 1;
    }
}
