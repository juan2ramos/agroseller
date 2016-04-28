<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeAdminController extends Controller
{

    function index(){
        return view('back.home');
    }
    function isValidateProviders(){
        return view('back.isValidateProviders');
    }
}
