<?php

namespace Agrosellers\Http\Middleware;

use Agrosellers\Entities\Provider;
use Closure;
use Illuminate\Support\Facades\Auth;

class sendHome
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $validate)
    {
        $user = Auth::user();

        if($validate == 'registerProvider'){
            $provider = Provider::where('user_id', '=', $user->id )->get();
            if(!$provider->isEmpty()){
                return redirect()->route('admin');
            }
        }
        if($validate == 'validateProvider') {
            if ($user->role_id != 3 || $user->validate != 0) {
                return redirect()->route('admin');
            }
        }
        return $next($request);
    }
}
