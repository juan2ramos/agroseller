<?php

namespace Agrosellers\Http\Controllers;

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
        $users = Table::create($rows,[
            'name' => 'Nombre',
            'email' => 'Email',

        ]);
        $users->addColumn('role_id', 'Rol', function($model) {return $model->role()->first()->name;});
        $users->addColumn('id', 'Acciones', function($model) {$id = $model->id;return '<a href="'.$id.'"> d </a>';});
        $routeSearch = 'searchUser';
        return view('back.users', compact('users','routeSearch'));

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
}
