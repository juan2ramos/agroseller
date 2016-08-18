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
        if(auth()->user()->role_id == 3){
            $plan = Plan::where('slug', $slug);
            return view('back.payPlan', compact('plan'));
        }
        else{
            return redirect()->route('admin')->with('messageError', 1);
        }
    }

    function historyPay()
    {
        $planProvider = Auth::user()->provider->with('planProvider')->first();

        return view('back.historyPlan',compact('planProvider'));
    }
}
