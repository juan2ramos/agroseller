<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Role;
use DB;
use Agrosellers\User;
use Gbrock\Table\Facades\Table;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Provider;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    private $roleName = [1=>'Super Administrador',2 => 'Administrador', 3 => 'Proveedor', 4 => 'Cliente', 5 => 'Agente'];

    function index()
    {
        $rows = User::with('role')->whereRaw('role_id in (1,2,4,5)')->sorted()->paginate();
        $users = Table::create($rows,['name' => 'Nombre', 'email' => 'Email',]);
        $users->addColumn('role_id', 'Rol', function($model) {return $model->role()->first()->name;});
        $users->addColumn('id', 'Acciones', function($model) {$id = $model->id;return '<a href="'.route('user', ['id' => $id ]) .'"> ver </a>';});
        $roles = Role::whereRaw('id in (1,2,4,5)')->get();
        return view('back.users', compact('users','roles'));

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

    function validateProvider($id){
        $provider = Provider::where('user_id', $id)->first();
        $provider->validate = 1;
        $provider->save();
        return redirect()->route('providers');
    }

    private function trash(){
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106.254 127.08375000000001">
                    <path d="M7.3 7.276H39.12v-8.28H66.31v8.28h31.823v12.53H7.3m56.288-17.9h-21.3V7.35h21.3zM15.608 25.12H91.36l-9.003 78.535H24.612m54.96-69.806h-7.538l-4.41 63.76h5.747zm-22.712.054h-7.54l.99 63.75h5.747zm-22.713.504h-7.54l6.39 63.63h5.747z"/> 
                </svg>';
    }
}
