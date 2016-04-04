<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeAdminController extends Controller
{

    function index(){
        //Pendiente para modificar enrutamiento //
        if(Auth::user()->role_id == 4) {
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
