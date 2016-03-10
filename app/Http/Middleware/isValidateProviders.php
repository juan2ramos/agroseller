<?php

namespace Agrosellers\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Entities\Provider;

class isValidateProviders
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
        $provider = Provider::where('user_id', '=', $user->id )->get();


        if($user->role_id != '3'){
            return $next($request);
        }

        if($provider->isEmpty()){
            return redirect()->route('registerProvider');
        }
        if($user->role_id == 3 && $user->validate == 0){
            return redirect()->route('isValidateProviders');
        }
        return $next($request);
    }
}
