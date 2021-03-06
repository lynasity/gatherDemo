<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Subscribe;
use App\Themes;
use App\extensions\StatusCode;
class ThemeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function subscribe(Request $request){
        $theme_id=$request->input('theme_id');
        if(is_null(Subscribe::where('theme_id',$theme_id)->first())){
             $subscribe=Subscribe::create(['user_id'=>Auth::user()->id,'theme_id'=>$request->input('theme_id')]);
            if($subscribe){
               return StatusCode::JsonResponse(200);
            }else{
               return StatusCode::JsonResponse(500);
            }
        }else{
            // if already exists
           return StatusCode::JsonResponse(200);
        }
        
    }

    public function showAllSubscribe(Request $request){
         $user_id=Auth::user()->id;
         $subscribes=Subscribe::where('user_id',$user_id)->get();
         if($subscribes){
             return StatusCode::JsonResponse(200,$subscribes);
         }else{
            return StatusCode::JsonResponse(404);
         } 
    }

    public function unSubscribe(Request $request){
        $user_id=Auth::user()->id;
        $theme_id=$request->input('theme_id');
        if(Subscribe::where('user_id',$user_id)->where('theme_id',$theme_id)->delete()){
           return StatusCode::JsonResponse(200);
        }else{
           return StatusCode::JsonResponse(500);
        }
    }

    public function showAll(){
        $themes=Themes::all();
        if($themes){
           return StatusCode::JsonResponse(200,$themes);
        }else{
            return StatusCode::JsonResponse(404);
        }
    }
    
}
