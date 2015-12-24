<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;

class HomeAdminController extends Controller
{
    function index(){

        return view('admin.home');
    }
    function isValidateProviders(){
        return view('admin.isValidateProviders');
    }
}
