<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateIfNotExist
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        if( ! $event->user instanceof User){
            if($user = User::where('mobile_number', $event->user)->first()){
                session()->put('reservation.user', $user);
            }else
            {
                $event->request['password'] = Hash::make('password');
                $event->request['role'] = 'customer';
                $event->request['mobile_number'] = session('reservation.user');

                $user = User::create($event->request->all());
                $passenger = $user->passenger()->create($event->request->all());

                session()->put('reservation.user', $user);
            }
        }

    }
}
