<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Event;
use App\User;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Event $event)
    {
        return $user->id === $event->organizer_id;
    }
}
