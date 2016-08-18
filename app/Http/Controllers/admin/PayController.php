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
use Jenssegers\Date\Date;

class PayController extends Controller
{
    function index(Request $request, $id){
        if(auth()->user()->role_id == 3){

            $plan = PlanProvider::where('provider_id', auth()->user()->provider->id)->orderBy('created_at', 'DESC')->first();
            if($plan){
                $date = new Date($plan->created_at);
                $finalPlan = $date->addMonths($plan->period);
            }
            else{
                $finalPlan = new Date();
            }

            if(new Date() >= $finalPlan){

                PlanProvider::create([
                    'provider_id' => auth()->user()->provider->id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'period' => $request->period,
                    'price' => $request->price
                ]);

                return redirect()->route('admin')->with(['message' => 'Estamos en proceso de aprobar su pedido. Pronto su asesor se comunicará con usted']);
            }
            return redirect()->route('admin')->with(['message' => "Usted ya ha comprado un plan. Este finaliza el día {$finalPlan}"]);
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
