<?php

namespace App\Observers;

use App\User;

class UserObserver
{
    /**
     * Listen to the User creating event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->api_token = str_random(60);
    }
}
