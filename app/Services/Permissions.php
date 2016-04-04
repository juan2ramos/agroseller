<?php

namespace Agrosellers\Services;

class Permissions
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
    private function permissionRole(){
        return [
            '1' => [

            ],
            '2' => [

            ],
            '3' => [

            ],
            '4' => [

            ],
            '5' => [

            ],
        ];
    }
}

