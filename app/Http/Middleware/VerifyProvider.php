<?php

namespace Agrosellers\Http\Middleware;

use Illuminate\Support\Facades\Gate;
use Closure;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Entities\PlanProvider;
use Jenssegers\Date\Date;

class VerifyProvider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if($user->role_id == 3){
            if(Gate::denies('isRegisterProvider', $user)){
                return redirect()->route('registerProvider');
            }
            elseif(Gate::denies('isValidateProvider', $user)){
                return redirect()->route('isValidateProviders');
            }

            /*$plan = PlanProvider::where('provider_id', $user->provider->id)->orderBy('created_at', 'DESC')->first();
            if(!$plan || new Date() > $this->getFinalPlan($plan))
                return redirect()->route('pricing')->with(['message' => 'No ha comprado un plan o su plan ha vencido. Adquiera uno de nuestros planes']);
            else
                if(!$plan->isActive)
                    return redirect()->route('inactivePlan');
            */
        }

        return $next($request);
    }

    function getFinalPlan($plan){
        $date = new Date($plan->created_at);
        return $date->addMonths($plan->period);
    }
}
