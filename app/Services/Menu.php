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
            'Inicio' => [
                'route' => 'admin',
                'roles' => [1, 2, 3, 4, 5],
                'class' => 'icon-leaf'
            ],
            'Usuarios' => [
                'route' => 'users',
                'roles' => [1, 2],
                'class' => 'icon-user2'
            ],
            'Proveedores' => [
                'route' => 'providers',
                'roles' => [1, 2, 5],
                'class' => 'icon-briefcase'
            ],

            'Categorias' => [
                'route' => 'category',
                'roles' => [1, 2],
                'class' => 'icon-notebook'
            ],
            'productos' => [
                'route' => 'products',
                'roles' => [1, 2, 3, 4],
                'class' => 'icon-lab'
            ],
            'Clientes' => [
                'route' => 'clients',
                'roles' => [1, 2, 3],
                'class' => 'icon-user'
            ],
            'Ofertas' => [
                'route' => 'offers',
                'roles' => [1, 2, 3],
                'class' => 'icon-credit'
            ],
            'Facturas' => [
                'route' => 'bills',
                'roles' => [1, 2, 3, 4],
                'class' => 'icon-wallet'
            ],
            'Pedidos' => [
                'route' => 'orders',
                'roles' => [1, 2, 3, 4],
                'class' => 'icon-cart'
            ],
            'Reportes' => [
                'route' => 'reports',
                'roles' => [1, 2, 5],
                'class' => 'icon-bars'
            ],
        ];
    }
}

