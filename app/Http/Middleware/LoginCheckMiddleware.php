<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class LoginCheckMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::has('login')){
            return redirect()->route('auth.login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }
        return $next($request);
    }
}