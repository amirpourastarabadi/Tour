<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourAdminCompletionValidation;
use App\Http\Requests\TourAdminRegisterValidation;
use App\Models\TourAdmin;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TourAdminController extends Controller
{

    use RegistersUsers;

    public function store(TourAdminRegisterValidation $request)
    {
        $request = $request->toArray();
        $request['role'] = 'tourAdmin';
        $request['password'] = Hash::make($request['password']);
        $tourAdmin = User::create($request);
        $this->guard()->login($tourAdmin);
        return redirect()->route('register.tourAdmin.completion');
    }

    public function registerCompletion()
    {
        return view('tourAdmin.registerCompletion')->withTourAdmin(Auth::user());
    }

    public function update(TourAdminCompletionValidation $request, User $tourAdmin)
    {
        $request = $request->toArray();
        $request['user_id'] = $tourAdmin->id;
        TourAdmin::create($request);
        return redirect()->route('tourAdmin.profile.index');
    }
}
