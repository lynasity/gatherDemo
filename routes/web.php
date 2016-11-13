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
$app->get('info',['middleware'=>'authToken','uses'=>'UserController@info']);

/**
   feedback
   arg1:api_token
 * arg2:feedback
 */
$app->post('feedback',['middleware'=>'authToken','uses'=>'UserController@feedback']);
/**
   user/uploadImage
 * arg1:api_token
   arg2: the file you want to upload 
 */
$app->get('user/uploadImage',['middleware'=>'authToken','uses'=>'UserController@uploadImage']);

/**
   user/getUserImage
 * arg1:api_token
 */
$app->get('user/getUserImage',['middleware'=>'authToken','uses'=>'UserController@getUserImage']);

/**
   user/updateGender
 * arg1:api_token
   arg2:gender
 */
$app->post('user/updateGender',['middleware'=>'authToken','uses'=>'UserController@updateGender']);

/**
   user/updateUsername
 * arg1:api_token
   arg2:username
 */
$app->post('user/updateUsername',['middleware'=>'authToken','uses'=>'UserController@updateUsername']);

/**
   user/updateUsername
 * arg1:api_token
   arg2:email
 */
$app->post('user/updateEmail',['middleware'=>'authToken','uses'=>'UserController@updateEmail']);
/**
   theme/subscribe
 * arg1:theme_id
   arg2:api_token
 */
$app->post('theme/subscribe',['middleware'=>'authToken','uses'=>'ThemeController@subscribe']);

/**
   theme/showAll
   arg1:api_token
 */
 $app->get('theme/allSubscribe',['middleware'=>'authToken','uses'=>'ThemeController@showAllSubscribe']);
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
$app->post('theme/unSubscribe',['middleware'=>'authToken','uses'=>'ThemeController@unSubscribe']);

/**
   message/pull
 * arg1:api_token
   arg2:page
 */
$app->get('feed/pull',['middleware'=>'authToken','uses'=>'FeedController@pull']);
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
$app->post('feed/collect',['middleware'=>'authToken','uses'=>'FeedController@collect']);

/**
   feed/cancelCollect
 * arg1:api_token
   arg2:feed_id
 */
$app->post('feed/cancelCollect',['middleware'=>'authToken','uses'=>'FeedController@cancelCollect']);

/**
   feed/getCollections
 *  arg1:api_token
 */
$app->get('feed/getCollections',['middleware'=>'authToken','uses'=>'FeedController@getCollections']);

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
 $app->get('feed/getNewFeeds',['middleware'=>'authToken','uses'=>'FeedController@getNewFeeds']);  
/**
    gzh/Synchronize
 *  arg1:api_token
 */
 $app->get('gzh/Synchronize','GzhController@Synchronize');