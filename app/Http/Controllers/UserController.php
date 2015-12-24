<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\User;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Category;

class UserController extends Controller
{
    private $roleName = [1=>'Super Administrador',2 => 'Administrador', 3 => 'Proveedor', 4 => 'Cliente'];

    function index()
    {
        $users = User::paginate(10);
        $roleName = $this->roleName;
        return view('admin.users', compact('users','roleName','menu'));

    }
    function showUser($id){

        $user = User::find($id);
        return view('admin.user',compact('user'));
    }

}