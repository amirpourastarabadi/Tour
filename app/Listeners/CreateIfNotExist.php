<?php

namespace App\Listeners;

use App\Models\Passenger;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

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
     * @return User
     */
    public function handle($event)
    {
        if($user = User::where('mobile_number', $event->request['mobile_number'])->first()){
            return $user;
        }
        $event->request['first_name'] = $event->request['last_name'] = 'guest';
        $event->request['password'] = Hash::make('password');
        $user = User::create($event->request->all());
        Passenger::create(['user_id' => $user->id, 'national_code' => \Illuminate\Support\Str::random(10)]);
        return $user;
    }
}
