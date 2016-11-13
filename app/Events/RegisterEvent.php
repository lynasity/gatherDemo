<?php

namespace App\Events;
use App\User;
class RegisterEvent extends Event
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public function __construct(User $user)
    {
        $this->user=$user;
    }
}
