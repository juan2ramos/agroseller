<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Entities\Client;
use Agrosellers\Entities\Agent;
use Agrosellers\Entities\Provider;

class HomeAdminController extends Controller
{

    function index(){

        $user = Auth::user();
        $client = Client::where('user_id', '=', $user->id)->get();

        if($user->role_id == 4 && count($client) == 0) {
            return redirect()->route('clientInformationIndex');
        }
        else if($user->role_id == 3){
            $provider = Provider::where('user_id', '=', $user->id);

            if(!$provider->first()->NIT){
                return redirect()->route('registerProvider');
            }
        }

        return view('back.home');
    }
    function isValidateProviders(){
        return view('back.isValidateProviders');
    }
}
