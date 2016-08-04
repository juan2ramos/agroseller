<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Plan;

class PlanController extends Controller
{
    function pricing(){
        $plans = Plan::all();
        return view('front.pricing', compact('plans'));
    }

    function planDetail(){
        return view('front.planDetail');
    }
}
