<?php

namespace Agrosellers\Http\Controllers\admin;

use Agrosellers\Entities\Provider;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;

use Agrosellers\Entities\Plan;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    function index($slug){
        dd();
        $plan = Plan::where('slug', $slug);
        return view('back.payPlan', compact('plan'));

    }

    function historyPay()
    {
        $planProvider = Auth::user()->provider->with('planProvider')->first();
        return view('back.historyPlan',compact('planProvider'));
    }
}
