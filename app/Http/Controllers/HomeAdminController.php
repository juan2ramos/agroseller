<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Entities\Client;

class HomeAdminController extends Controller
{

    function index(){

        $user = Auth::user();
        $client = Client::where('user_id', '=', $user->id)->get();

        if($user->role_id == 4 && count($client) == 0) {
            return redirect()->route('clientInformationIndex');
        }
        else{
            return view('back.home');
        }
    }
    function isValidateProviders(){
        return view('back.isValidateProviders');
    }
}
