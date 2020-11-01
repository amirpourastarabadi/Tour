<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mockery\Exception;

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
     *
     */
    public function handle($event)
    {
        if($user = User::where('mobile_number', $event->request['mobile_number'])->first()){
            return $user->toArray();
        }
        $event->request['role'] = 'customer';
        try{
            $user = User::create($event->request->all());
            $user->passenger()->create($event->request->all());
        }catch (Exception $exception){
            return back();
        }
        return $user;

    }
}
