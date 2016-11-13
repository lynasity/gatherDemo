<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthToken
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
//Auth::check() will check the state and then save the current user 
      if(Auth::check()){
              return $next($request);
      }else{
          return response()->json(['code'=>401,'status'=>'Unauthorized']);
      }
    }
}
