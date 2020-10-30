<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassengerRegisterValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PassengerController extends Controller
{
    public function store(PassengerRegisterValidation $request)
    {
        $request = $request->toArray();
        $request['role'] = 'customer';
        $request['password'] = Hash::make($request['password']);
        User::create($request);
        return redirect()->back();
    }
}
