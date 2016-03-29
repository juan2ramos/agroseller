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
        $routeSearch = 'searchUser';
        return view('back.users', compact('users','roleName','routeSearch'));

    }
    function showUser($id){
        $user = User::find($id);
        return view('back.user',compact('user'));
    }


    function searchUsers(Request $request){
        $search = $request->input('search');

        $users = User::where(function ($query) use ($search) {
            $query->Where('name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', '=',  $search )
                ->orWhere('second_name', 'like', '%' . $search . '%')
                ->orWhere('second_last_name', 'like', '%' . $search . '%')
                ->orWhere('identification', '=',   $search );
        })->paginate(50);
        $roleName = $this->roleName;
        $routeSearch = 'searchUser';
        return view('back.users', compact('users','roleName','routeSearch','search'));
    }
}
