<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourAdminRegisterValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TourAdminController extends Controller
{
    public function store(TourAdminRegisterValidation $request)
    {
        $request = $request->toArray();
        $request['role'] = 'tourAdmin';
        $request['password'] = Hash::make($request['password']);
        User::create($request);
        return redirect()->back();
    }
}
