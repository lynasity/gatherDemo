<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Schema;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\RegisterEvent;
use App\UserFeeds;
use Illuminate\Support\Facades\DB;
// use to autimatically create a feed table for a new register user.
class FeedListener 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(RegisterEvent $event)
    {
        // for extension
         $feedName=$event->user->username;
         if(!Schema::connection('feeds')->hasTable($feedName)){
        Schema::connection('feeds')->create($feedName, function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->longText('description');
            $table->string('organization');
            $table->string('date');
            $table->timestamps();
         });
        }
         // DB::connection('feeds')->statement('create table');
    }
}
