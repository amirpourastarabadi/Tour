<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassengerEditRequest;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;

class ProfileController extends Controller
{
    public function index()
    {
        return view('passenger.profile.show')->withPassenger(Auth::user());
    }

    public function edit(User $profile)
    {
        return view('passenger.profile.edit')->withPassenger($profile);
    }

    public function update(PassengerEditRequest $request, User $profile)
    {
        $profile->update($request->all());
        $profile->passenger->update($request->all());
        return redirect()->route('passenger.profile.index')->withResult([
            'message' => __('passenger.alerts.profile.update_passenger'),
            'alert'   => 'success',
        ]);
    }

    public function resetPassword(Request $request, User $passenger)
    {
        $request->validate([
            'password'          => 'bail|required|min:6|confirmed',
        ]);
        $passenger['password'] = Hash::make($request->password);
        $passenger->save();
        return redirect()->back()->withResult([
            'message' => __('passenger.alerts.profile.password_changed'),
            'alert'   => 'primary',
        ]);
    }
}
