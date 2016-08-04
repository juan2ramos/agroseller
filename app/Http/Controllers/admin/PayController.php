<?php

namespace Agrosellers\Http\Controllers\admin;

use Agrosellers\Entities\Provider;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{

    function index()
    {
        dd('asdas');
        return view();
    }

    function historyPay()
    {

        $provider = Auth::user()->provider->with('planProvider')->first();
        dd($provider);
        return view('');
    }
}
