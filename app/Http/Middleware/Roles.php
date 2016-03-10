<?php

namespace Agrosellers\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleId)
    {
        $user = Auth::user();
        $roles = explode('-',$roleId);
        if(!in_array($user->role_id,$roles)){
            return redirect()->route('admin');
        }
        return $next($request);
    }
}
