<?php
namespace App\extensions;
class StatusCode{
	const codeToStatus=array(200=>'ok',
		                     404=>'not found',
		                     500=>'Internal Server Error',
		                     400=>'BadRequest'
		                     );
	public static function JsonResponse($code,$data=null){
		if(is_null($data)){
          return response()->json(['code'=>$code,'status'=>self::codeToStatus[$code]]);
		}else{
           return response()->json(['code'=>$code,'status'=>self::codeToStatus[$code],'data'=>$data]);
		}
	}

}