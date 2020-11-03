<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request, User $profile)
    {
        $request->validate([
           'mobile_number' => 'unique:users,id'
        ]);
        $profile->update($request->all());
        return redirect()->route('admin.profile.index')->withResult([
            'message' => __('Admin.alerts.admin.update_admin', ['first_name' => $profile->first_name, 'last_name' => $profile->last_name]),
            'alert'   => 'success',
        ]);
    }


}
