<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Logeado
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
        //vamos a verificar que tenga un dato de session
        if(!Session::has('admin')){
            return redirect("/logout");
        }
        return $next($request);
    }
}
