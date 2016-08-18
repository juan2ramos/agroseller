<?php

namespace Agrosellers\Policies;

use Agrosellers\Entities\PlanProvider;
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
        return $this->user->provider->validate == 1;
    }

    public function isPlanPayed(){
        return $this->user->provider->planProvider;
    }

    public function isPlanActive(){
        $plan = PlanProvider::where('provider_id', $this->user->provider->id)->orderBy('created_at', 'DESC')->first();
        if($plan)
            return $plan->isActive;
    }
}
