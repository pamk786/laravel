<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ClientMiddleware
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
      if (Auth::user()) {
        if ($request->user()->is_client != 1){
          Auth::logout();
          return redirect('/');
    		}
      }
      return $next($request);
    }
}
