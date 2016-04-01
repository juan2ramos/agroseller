<?php

namespace Agrosellers\Services;


use Illuminate\Support\Facades\Auth;

class Menu
{
    private $menuUser = [];

    function __construct()
    {
        $this->menuUser();
    }
    private function menuUser(){

        $userRole = Auth::user()->role_id;
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
            'Home' => [
                'route' => 'admin',
                'roles' => [1, 2, 3, 4, 5],
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
            'Clientes' => [
                'route' => 'clients',
                'roles' => [1, 2, 3],
                'class' => 'client'
            ],
            'Ofertas' => [
                'route' => 'offers',
                'roles' => [1, 2, 3],
                'class' => 'offer'
            ],
            'Facturas' => [
                'route' => 'bills',
                'roles' => [1, 2, 3, 4],
                'class' => 'bill'
            ],
            'Pedidos' => [
                'route' => 'orders',
                'roles' => [1, 2, 3, 4],
                'class' => 'order'
            ],
            'Reportes' => [
                'route' => 'reports',
                'roles' => [1, 2, 5],
                'class' => 'report'
            ],
        ];
    }
}

