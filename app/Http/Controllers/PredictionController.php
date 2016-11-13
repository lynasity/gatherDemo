<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use predictionio\EventClient;
// use \;
class PredictionController extends Controller
{
    public function sendEvents(){
        $accessKey = 'iMmASHK663gg9XufSSdIR96Wg33dr2-YYvfqFktAxwkAhOxhGmWtNWm3VaewFNh1';
        $client = new EventClient($accessKey);
        $response = $client->createEvent(array(
                        'event' => 'getNews',
                        'entityType' => 'feeds',
                        'entityId' => 'feed_is',
                        'properties' => array('category' =>'知识竞赛',
                                              'text' => '第二届校园百科网络知识竞赛即将开战！丰厚奖励等你拿',
                                        ),
                        'eventTime' => date(DATE_ISO8601, time())
        ));
    }
}
