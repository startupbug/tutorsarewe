<?php

namespace App\Listeners;

use App\Events\UserRegistration;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Profile;

class CreateProfile
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
     * @param  UserRegistration  $event
     * @return void
     */
    public function handle(UserRegistration $event)
    {
        //
        $p = new Profile();
        
        $p->user_id = $event->data['user']->id;
        $p->bio = $event->data['request']['bio'];
        $p->username = $event->data['user']->email;
        $p->tution_per_hour = $event->data['request']['tution_per_hour'];
        $p->gender = $event->data['request']['gender'];
        $p->age = $event->data['request']['age'];
        $p->save();
    }
}
