<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Admin;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Admin::user()==null){
            return redirect()->route('main');
        }
        return $next($request);
    }
}
