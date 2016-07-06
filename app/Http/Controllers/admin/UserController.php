<?php

namespace Agrosellers\Http\Controllers\admin;

use Agrosellers\Entities\Agent;
use Agrosellers\Entities\Role;
use DB;
use Agrosellers\User;
use Gbrock\Table\Facades\Table;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Provider;
use Illuminate\Support\Facades\View;
use Agrosellers\Http\Controllers\Controller;

class UserController extends Controller
{
    function agentsGet(){
        return  Agent::with(['user' => function ($query) {
            $query->addSelect(['id', 'name'])->get();
        }])->get(['user_id','name']);
    }
    function user( $id){

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('back.userEdit',compact('user', 'roles'));
    }
    function newUserAdmin(Request $request){
        $inputs = $request->all();
        $files = $request->file();

        $fileName = str_random(40) . '**' . $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(base_path() . '/public/uploads/users/', $fileName);

        $inputs['photo'] = $fileName;
        $user = User::create($inputs);

        if($inputs['role_id'] == 5 ){
            $agent = Agent::where('user_id',$inputs['agent'])->first();
            $agent['user_id'] = $user->id;
            $agent->save();
        }
        return redirect()->back()->with('messageSuccess', 1);
    }

}
