<?php

namespace Agrosellers\Http\Controllers\admin;


use Agrosellers\User;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;

class ClientController extends Controller
{


    function showClients()
    {
        $users = User::where('role_id', '=', 4)->with('client')->paginate(10);
        return view('back.clients', compact('users'));
    }


}
