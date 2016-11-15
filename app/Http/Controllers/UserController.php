<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Events\RegisterEvent;
use App\User;
use App\UserFeedback;
use Auth;
use App\extensions\StatusCode;
use App\traits\AuthUser;
class UserController extends Controller
 {
   use AuthUser;
   private $salt;
   public function __construct()
   {
     $this->salt="sunshine";
   }

   public function login(Request $request){

    if ($request->has('username') && $request->has('password')) {
     $user = User:: where("username", "=", $request->input('username'))->where("password", "=", sha1($this->salt.$request->input('password')))->first();
      // if user exists
      if(!$user) {
        return StatusCode::JsonResponse(404);
      }
      // update api_token and return it
       $token=str_random(60);
       $user->api_token=$token;
       $user->save();
       return StatusCode::JsonResponse(200,$user);
     }else{
        return StatusCode::JsonResponse(400);
    }
  }

 public function register(Request $request){
  // return sha1($this->salt.$request->input('password'));
     if($request->has('username') && $request->has('password') && $request->has('email')){
       $user = User::create(['username'=>$request->input('username'),'password'=>sha1($this->salt.$request->input('password')),'email'=>$request->input('email'),'api_token'=>str_random(60)]);
       if(!$user){ 
          return StatusCode::JsonResponse(500);
       } 
         // fire the register event
          // event(new RegisterEvent($user));    
          return StatusCode::JsonResponse(200,$user->api_token);
     }else{
         return  StatusCode::JsonResponse(400);
     }   
 }
     
     public function info(request $request){
           $user=$this->getCurrentUser($request);
           if($user){
              return StatusCode::JsonResponse(200,$user);
           }else{
              return StatusCode::JsonResponse(404);
           }         
     }

     public function feedback(request $request){
          $feedback=UserFeedback::create(['username'=>Auth::user()->username,'feedback'=>$request->input('feedback')]);
          if($feedback){
            return StatusCode::JsonResponse(200);
          }else{
            return StatusCode::JsonResponse(500);
          }
     }

    public function uploadImage(request $request){
            if($request->hasFile('userImage')){
              if($request->file('photo')->isValid()){
                $fileName='user'.(Auth::user()->id).'png';
                  $request->file('userImage')->move('./data/user/images',$fileName);
                 return StatusCode::JsonResponse(200);
              }else{
                return StatusCode::JsonResponse(500);
              }
              
            }else{
              return StatusCode::JsonResponse(400);
            }
            
    }

    public function getUserImage(request $request){
      $userId=$this->getCurrentUser($request)->id;
      if(file_exists("./data/user/images/user$userId.png")){
        return response()->download("./data/user/images/user$userId.png");
      }else{
        return StatusCode::JsonResponse(404);
      }
    }

    // public function updateLocation(){

    // }

    public function updateGender(request $request){
        if(!$request->input('gender')){
            return StatusCode::JsonResponse(400);
        }
          $user=$this->getCurrentUser($request);
          if($user){
             $user->gender=$request->input('gender');
             if(!$user->save()){
                return StatusCode::JsonResponse(500);
             }
                return StatusCode::JsonResponse(200);
          }else{
                return StatusCode::JsonResponse(404);
          }

    }


    public function updateUserName(request $request){
         if(!$request->input('username')){
            return StatusCode::JsonResponse(400);
        }
          $user=$this->getCurrentUser($request);
          if($user){
             $user->username=$request->input('username');
             if(!$user->save()){
                return StatusCode::JsonResponse(500);
             }
                return StatusCode::JsonResponse(200);
          }else{
                return StatusCode::JsonResponse(404);
          }
    }

    public function updateEmail(request $request){
          if(!$request->input('email')){
            return StatusCode::JsonResponse(400);
        }
          $user=$this->getCurrentUser($request);
          if($user){
             $user->email=$request->input('email');
             //need to be verified 
             if(!$user->save()){
                return StatusCode::JsonResponse(500);
             }
                return StatusCode::JsonResponse(200);
          }else{
                return StatusCode::JsonResponse(404);
          }
    }
    
}