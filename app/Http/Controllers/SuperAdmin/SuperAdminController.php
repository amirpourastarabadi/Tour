<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAdminController extends Controller
{

    public function index()
    {
        $admins_count = User::where('role', 'admin')->count();
        return view('superAdmin.profile.show')->withSuperAdmin(Auth()->user())->withAdminsCount($admins_count);
    }


    public function edit(User $profile)
    {
        return view('superAdmin.profile.edit')->withSuperAdmin($profile);
    }


    public function update(Request $request, User $profile)
    {
        $profile->update($request->all());
        return redirect()->route('superAdmin.profile.index')->withResult([
            'message' => __('superAdmin.alerts.admin.update_superAdmin', ['first_name' => $profile->first_name, 'last_name' => $profile->last_name]),
            'alert'   => 'success',
        ]);
    }


    public function keyGenerate(User $profile)
    {
        $pass = Str::random(10);
        $profile->password = Hash::make($pass);
        $profile->save();

        return redirect()->back()->withResult([
            'message' => __('superAdmin.alerts.admin.reset_password', ['password' => $pass]),
            'alert'   => 'primary',
        ]);
    }
}
