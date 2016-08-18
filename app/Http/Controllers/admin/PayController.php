<?php

namespace Agrosellers\Http\Controllers\admin;

use Agrosellers\Entities\PlanProvider;
use Agrosellers\Entities\Provider;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;

use Agrosellers\Entities\Plan;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    function index(Request $request, $id){
        if(auth()->user()->role_id == 3){

            // 2592000 1 mes

            $plan = PlanProvider::where('provider_id', auth()->user()->provider->id)->orderBy('created_at', 'DESC')->first();
            $finalPlan = strtotime($plan->created_at) + $plan->period * 2592000;

            if(strtotime(date('Y-m-d H:i:s')) > $finalPlan){
            
                PlanProvider::create([
                    'provider_id' => auth()->user()->provider->id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'period' => $request->period,
                    'price' => $request->price
                ]);

                $message = ['message' => 'Estamos en proceso de aprobar su pedido. Pronto su asesor se comunicará con usted'];
            }
            else {

                $message = ['message' => "Usted ya ha comprado un plan. Este finaliza el día {$finalPlan}"];
            }
            return redirect()->route('admin')->with($message);
            //return view('back.payPlan', compact('plan'));
        }
        else{
            return redirect()->route('admin')->with('messageError', 1);
        }
    }

    function historyPay()
    {
        $provider = Auth::user()->provider->with('planProvider')->first();
        return view('back.historyPlan',compact('provider'));
    }
}
