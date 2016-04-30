<?php

namespace Agrosellers\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Type\Collection;

class RoutePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    private $acl;
    private $route;

    public function __construct($route)
    {
        $this->route = $route;
        $this->acl();
    }

    private function acl()
    {

        $this->acl = [
            '1' =>
                [
                    'admin', 'users', 'providers', 'category', 'farmIndex', 'products', 'questions', 'clients',
                    'bills', 'orders', 'reports', 'subcategoriesQuery','featuresQuery'
                ],
            '2' =>
                [
                    'admin', 'users', 'providers', 'category', 'farmIndex', 'products', 'clients', 'bills',
                    'orders', 'subcategoriesQuery','featuresQuery'
                ],
            '3' =>
                [
                    'admin', 'products', 'questions', 'orders',
                ],
            '4' =>
                [
                    'admin', 'products', 'bills', 'orders', 'reports'
                ],
            '5' =>
                [
                    'admin', 'providers', 'clients', 'reports'
                ],
            '6' =>
                [
                    'admin', 'reports'
                ],
        ];
    }

    function routeValidate()
    {
        $role = Auth::user()['role_id'];
        return !in_array($this->route, $this->acl[$role]);
    }
}
