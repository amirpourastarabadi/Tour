<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassengerRegisterValidation;
use App\Http\Requests\PassengerRequest;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PassengerController extends Controller
{
    use RegistersUsers;

    public function store(PassengerRegisterValidation $request)
    {
        $request = $request->toArray();
        $request['role'] = 'passenger';
        $request['password'] = Hash::make($request['password']);
        $passenger = User::create($request);
        $this->guard()->login($passenger);
        return redirect()->route('register.passenger.completion');
    }

    public function registerCompletion()
    {
        return view('passenger.registerCompletion')->withPassenger(Auth::user());
    }

    public function update(PassengerRequest $request, User $passenger)
    {
        $request = $request->toArray();
        $request['user_id'] = $passenger->id;
        Passenger::create($request);
        return redirect()->route('passenger.profile.index');
    }
}
