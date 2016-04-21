<?php

namespace Agrosellers\Providers;
use Agrosellers\Entities\Category;
use Agrosellers\User ;
use Agrosellers\Policies\CategoryPolicy;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'Agrosellers\Model' => 'Agrosellers\Policies\ModelPolicy',
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        $gate->define('admin',function(User $user){
            return $user->email == "juan2sramos@gmail.com";
        });

        //
    }
}
