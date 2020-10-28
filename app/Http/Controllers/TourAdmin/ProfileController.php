<?php

namespace App\Http\Controllers\TourAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('tourAdmin.profile.show', compact('user'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        return view('tourAdmin.profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        Auth::user()->update($request->all());
        Auth::user()->tourAdmin->update($request->all());
        return redirect()->back();

    }

    public function destroy($id)
    {
    }

    public function restPassword()
    {
        $pass = Str::random(10);
        Auth::user()->password = Hash::make($pass);
        Auth::user()->save();
        return redirect()->back()->withResult([
            'message' => __('superAdmin.alerts.admin.reset_password', ['password' => $pass]),
            'alert' => 'primary',
        ]);
    }
}
