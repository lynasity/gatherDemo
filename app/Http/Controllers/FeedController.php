<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Subscribe;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Collections;
use App\ThemeFeeds;
use App\extensions\StatusCode;
class FeedController extends Controller
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

    // push to theme when has new messages
    public function push(){
              
    }

    // get new message, every time return 40
    public function pull(request $request){
          $user_id=Auth::user()->id;
          // first time , page =0
          $page=$request->input('page');
          $offset=$page*40;
          $contents=app('db')->select("SELECT title,description,organization,date FROM subscribes AS s INNER JOIN themefeeds AS t ON t.theme_id=s.theme_id WHERE s.user_id=$user_id ORDER BY date DESC limit $offset,40");
          if($contents){
            return StatusCode::JsonResponse(200,$contents);
        }else{
          return StatusCode::JsonResponse(404);
        }
   }

   public function pullAll(request $request){
          $page=$request->input('page');
          $offset=$page*40;
          $contents=app('db')->select("SELECT id,theme_id,title,description,organization,date FROM themefeeds ORDER BY date DESC limit $offset,40");
          if($contents){
             return StatusCode::JsonResponse(200,$contents);
        }else{
          return StatusCode::JsonResponse(404);
        }
   }

   public function collect(Request $request){
       $feed_id=$request->input('feed_id');
       if(!ThemeFeeds::find($feed_id)){
           return StatusCode::JsonResponse(400);
       }
       $collection=Collections::create(['user_id'=>Auth::user()->id,'feed_id'=>$request->input('feed_id')]);
       if($collection){
          return StatusCode::JsonResponse(200);
       }else{
          return StatusCode::JsonResponse(500);
       }
    }

    public function cancelCollect(Request $request){
          $user_id=Auth::user()->id;
          $feed_id=$request->input('feed_id');
          $collection=Collections::where('user_id',$user_id)->where('feed_id',$feed_id)->first();
          if($collection){
              if($collection->delete()){
                 return StatusCode::JsonResponse(200);
              }else{
                 return StatusCode::JsonResponse(500);
              }
          }else{
             return StatusCode::JsonResponse(404);
          }
    }

    public function getCollections(Request $request){
      $user_id=Auth::user()->id;
      $contents=app('db')->select("SELECT title,description,organization,date FROM collections AS c INNER JOIN themefeeds AS t ON t.id=c.feed_id WHERE c.user_id=$user_id ORDER BY date DESC");
      if($contents){
            return StatusCode::JsonResponse(200,$contents);
        }else{
          return StatusCode::JsonResponse(404);
        }
    }

    public function getNewFeeds(Request $request){
         $time=$request->input('time');
         // if there has new messages
         $news=ThemeFeeds::where('created_at','>',$time)->get();
         if($news){
            return StatusCode::JsonResponse(200,$news);  
         }else{
          // if no news , it wouldn't return data
            return StatusCode::JsonResponse(404);
         }
    }


}
