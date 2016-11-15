<?php
namespace App\traits;
use App\User;
use Illuminate\Http\Request;
trait AuthUser{
	public function getCurrentUser(request $request){
      return User::where('api_token',$request->input('api_token'))->first();
    }
}