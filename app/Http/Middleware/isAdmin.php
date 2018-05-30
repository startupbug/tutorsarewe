<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   //dd();
        //abort(404);
        if(!Auth::user()->role_id == 1){
            return redirect()->route('unauthorized');
        }else{
            return $next($request);
        }


    }
}
