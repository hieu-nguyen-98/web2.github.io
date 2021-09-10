<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role=='admin') {
             return $next($request);
        }else{
            return redirect()->route(auth()->user()->role())->with('error','You do not have access');
        }
       
    }
}
