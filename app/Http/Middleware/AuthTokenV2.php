<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthTokenV2
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
       if(User::where('api_token', $request->input('api_token'))->first()){
            return $next($request);
       }else{
          return response()->json(['code'=>401,'status'=>'Unauthorized']);
      }
    }
}
