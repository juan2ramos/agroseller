<?php

namespace Agrosellers\Http\Controllers;

use DB;
use Validator;
use Gbrock\Table\Facades\Table;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Agrosellers\User;
use Agrosellers\Entities\Provider;
use Agrosellers\Entities\Role;
use Agrosellers\Entities\Product;

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
    function searchUsers(Request $request){
        $search = $request->input('search');

        $rows = User::with('role')->where(function ($query) use ($search) {
            $query->Where('name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', '=',  $search )
                ->orWhere('second_name', 'like', '%' . $search . '%')
                ->orWhere('second_last_name', 'like', '%' . $search . '%')
                ->orWhere('identification', '=',   $search );
        })->sorted()->paginate(10);
        $users = Table::create($rows,['name' => 'Nombre', 'email' => 'Email',]);
        $users->addColumn('role_id', 'Rol', function($model) {return $model->role()->first()->name;});
        $users->addColumn('id', 'Acciones', function($model) {$id = $model->id;return '<a href="'.route('user', ['id' => $id ]) .'"> ver </a>';});

        $roleName = $this->roleName;
        $routeSearch = 'searchUser';
        $roles = Role::whereRaw('id in (1,2,4,5)')->get();
        return view('back.users', compact('users','roleName','routeSearch','search','roles'));
    }
    function indexProfile(){
        $user = auth()->user();
        return view('back.profile', compact('user'));
    }

    function userUpdate(Request $request){
        $user = auth()->user();
        $files = $request->file();
        $inputs = $request->all();
        $user->phone = $inputs['phone'];
        $user->second_name = $inputs['second_name'];
        $user->second_last_name = $inputs['second_last_name'];
        $user->update($inputs);

        foreach ($files as $key => $file) {
            $fileName = str_random(40) . '**' . $request->file($key)->getClientOriginalName();
            $request->file($key)->move(base_path() . '/public/uploads/users/', $fileName);
            $user[$key] = $fileName;
        }
        $user->save();

        return redirect()->route('admin');
    }


    function providerUpdate(Request $request){
        $provider = auth()->user()->provider;
        $validator = Validator::make($request->all(), [
            'company-name' => 'required',
            'contact' => 'required',
            'contact-phone' => 'required',
            'description' => 'required',
            'address' => 'required',
            'location' => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator);

        $provider->update($request->all());
        return redirect()->to('/admin');
    }

    function showUser($id){
        $user = User::find($id);
        /*$products = Product::where('user_id', $id)->get();*/
        $products = [];
        $provider = Provider::where('user_id', $id)->first();
        return view('back.user',compact('user', 'products', 'provider'));
    }

    function validateProvider($id){
        $provider = Provider::where('user_id', $id)->first();
        if($provider->validate)
            $provider->validate = 0;
        else
            $provider->validate = 1;
        $provider->save();

        Mail::send('emails.validateProvider', ['user' => $provider->user], function ($m) use ($provider) {
            $m->to($provider->user->email, $provider->user->name)->subject('Ya eres un proveedor!');
        });

        return redirect()->route('providers');
    }



    private function trash(){
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106.254 127.08375000000001">
                    <path d="M7.3 7.276H39.12v-8.28H66.31v8.28h31.823v12.53H7.3m56.288-17.9h-21.3V7.35h21.3zM15.608 25.12H91.36l-9.003 78.535H24.612m54.96-69.806h-7.538l-4.41 63.76h5.747zm-22.712.054h-7.54l.99 63.75h5.747zm-22.713.504h-7.54l6.39 63.63h5.747z"/> 
                </svg>';
    }
}
