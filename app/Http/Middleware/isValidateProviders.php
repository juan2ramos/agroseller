<?php

namespace Agrosellers\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if($user->role_id == 3 && $user->validate == 0){
            return redirect()->route('isValidateProviders');
        }
        return $next($request);
    }
}
