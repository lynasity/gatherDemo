<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

/**
   login
 * arg1:username
   arg2:password
 */
$app->post('login','UserController@login');
/**
   register
 * arg1:username
   arg2:password
   arg3:email
 */
$app->post('register','UserController@register');
/**
   info
 * arg1:api_token
 */
$app->get('info',['middleware'=>'authTokenV2','uses'=>'UserController@info']);

/**
   feedback
   arg1:api_token
 * arg2:feedback
 */
$app->post('feedback',['middleware'=>'authTokenV2','uses'=>'UserController@feedback']);
/**
   user/uploadImage
 * arg1:api_token
   arg2: the file you want to upload 
 */
$app->get('user/uploadImage',['middleware'=>'authTokenV2','uses'=>'UserController@uploadImage']);

/**
   user/getUserImage
 * arg1:api_token
 */
$app->get('user/getUserImage',['middleware'=>'authTokenV2','uses'=>'UserController@getUserImage']);

/**
   user/updateGender
 * arg1:api_token
   arg2:gender
 */
$app->post('user/updateGender',['middleware'=>'authTokenV2','uses'=>'UserController@updateGender']);

/**
   user/updateUsername
 * arg1:api_token
   arg2:username
 */
$app->post('user/updateUsername',['middleware'=>'authTokenV2','uses'=>'UserController@updateUsername']);

/**
   user/updateUsername
 * arg1:api_token
   arg2:email
 */
$app->post('user/updateEmail',['middleware'=>'authTokenV2','uses'=>'UserController@updateEmail']);
/**
   theme/subscribe
 * arg1:theme_id
   arg2:api_token
 */
$app->post('theme/subscribe',['middleware'=>'authTokenV2','uses'=>'ThemeController@subscribe']);

/**
   theme/showAll
   arg1:api_token
 */
 $app->get('theme/allSubscribe',['middleware'=>'authTokenV2','uses'=>'ThemeController@showAllSubscribe']);
/**
   theme/synSubscribes
   arg1:api_token
   arg2:themes array of theme_id
 */
 $app->post('theme/synSubscribes',['middleware'=>'authTokenV2','uses'=>'ThemeController@synSubscribes']);
 
/**
   theme/all
   arg1:api_token
 */
 $app->get('theme/all','ThemeController@showAll');
/**
   theme/unSubscribe
 * arg1:theme_id
   arg2:api_token
 */
$app->post('theme/unSubscribe',['middleware'=>'authTokenV2','uses'=>'ThemeController@unSubscribe']);

/**
   message/pull
 * arg1:api_token
   arg2:page
 */
$app->get('feed/pull',['middleware'=>'authTokenV2','uses'=>'FeedController@pull']);
/**
   message/pullAll
   arg1:page
 */
$app->get('feed/pullAll','FeedController@pullAll');
/**
   feed/collect
 * arg1:api_token
   arg2:feed_id
 */
$app->post('feed/collect',['middleware'=>'authTokenV2','uses'=>'FeedController@collect']);
/**
   feed/synCollections
 * arg1:api_token
   arg2:feeds
 */
$app->post('feed/synCollections',['middleware'=>'authTokenV2','uses'=>'FeedController@synCollections']);

/**
   feed/cancelCollect
 * arg1:api_token
   arg2:feed_id
 */
$app->post('feed/cancelCollect',['middleware'=>'authTokenV2','uses'=>'FeedController@cancelCollect']);

/**
   feed/getCollections
 *  arg1:api_token
 */
$app->get('feed/getCollections',['middleware'=>'authTokenV2','uses'=>'FeedController@getCollections']);

// /**
//    pio/sendEvents
//  *  arg1:api_token
//  */
// $app->post('feed/getCollections',['middleware'=>'authToken','uses'=>'PredictionController@sendEvents]);

/**
   feed/getNewMessage
 *  arg1:api_token
    arg2:the time of the latest message
 */
 $app->get('feed/getNewFeeds',['middleware'=>'authTokenV2','uses'=>'FeedController@getNewFeeds']);  
/**
    gzh/Synchronize
 *  arg1:api_token
 */
 $app->get('gzh/Synchronize','GzhController@Synchronize');


