<?php

namespace Agrosellers\Http\Middleware;

use Agrosellers\Policies\RoutePolicy;
use Closure;
use Illuminate\Support\Facades\Auth;

class Routes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routePolicy = new RoutePolicy($request->route()->getName());
        if($routePolicy->routeValidate()){
            return redirect()->route('admin');
        }
        return $next($request);
    }
}
