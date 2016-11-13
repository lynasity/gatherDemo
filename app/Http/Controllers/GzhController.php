<?php

namespace App\Http\Controllers;
use App\Gzh;
use App\extensions\StatusCode;
class GzhController extends Controller
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

    public function Synchronize(){
        $gzhs=Gzh::all();
        if($gzhs){
           return StatusCode::JsonResponse(200,$gzhs);
        }else{
          return StatusCode::JsonResponse(404);
        }
    } 
}
