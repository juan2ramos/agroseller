<?php

namespace Agrosellers\Services;

use Gate;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Entities\Provider;

class Menu
{
    private $menuUser = [];
    private $user;
    function __construct()
    {
        $this->menuUsers();
    }
    private function menuUsers(){

        $user = Auth::user();
        $this->user = $user;
        $userRole = $user->role_id;
        $menuUser = $this->menuConfig();

        foreach ($menuUser as $key => $menu){

            if(!in_array($userRole, $menu['roles'])){
                unset($menuUser[$key]);
            }
        }

        $this->menuUser = $menuUser;
    }
    function getMenu(){
        return $this->menuUser;
    }

    private function menuConfig(){
        return [
            'Dashboard' => [
                'route' => 'admin',
                'roles' => [1, 2, 3, 4, 5, 6],
                'class' => 'home'
            ],
            'Usuarios' => [
                'route' => 'users',
                'roles' => [1, 2],
                'class' => 'user'
            ],
            'Proveedores' => [
                'route' => 'providers',
                'roles' => [1, 2, 5],
                'class' => 'provider'
            ],
            'Categorias' => [
                'route' => 'category',
                'roles' => [1, 2],
                'class' => 'category'
            ],
            'Cultivos' => [
                'route' => 'farmIndex',
                'roles' => [1, 2],
                'class' => 'farm'
            ],
            'Productos' => [
                'route' => 'products',
                'roles' => [1, 2, 3, 4],
                'class' => 'product'
            ],
            'Preguntas' => [
                'route' => 'questions',
                'roles' => [1, 3, 4],
                'class' => 'question'
            ],
            'Productores' => [
                'route' => 'clients',
                'roles' => [1, 2, 5],
                'class' => 'client'
            ],
            'Cotizaciones' => [
                'route' => 'budgetShow',
                'roles' => [1, 2, 4],
                'class' => 'budgets'
            ],
            'Compras' => [
                'route' => 'orderShow',
                'roles' => [1, 2, 4, 5],
                'class' => 'order'
            ],
            'Pedidos' => [
                'route' => 'orderShowProvider',
                'roles' => [ 3, 5],
                'class' => 'order'
            ],
            'Pagos' => [
                'route' => 'historyPay',
                'roles' => [3],
                'class' => 'report'
            ],
            'Reportes' => [
                'route' => 'reports',
                'roles' => [1,  6],
                'class' => 'report'
            ],
        ];
    }
}

