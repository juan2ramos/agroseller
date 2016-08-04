<?php

namespace Agrosellers\Http\Controllers\admin;

use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Agrosellers\Entities\Plan;

class PayController extends Controller
{
    function index($slug){
        $plan = Plan::where('slug', $slug);
        return view('back.payPlan', compact('plan'));
    }
}
