<?php

namespace Agrosellers\Http\Middleware;

use Illuminate\Support\Facades\Gate;
use Closure;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Entities\Provider;

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
        }
        return $next($request);
    }
}
