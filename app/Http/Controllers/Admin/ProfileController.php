<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'mobile_number' => 'unique:users,id'
        ]);
        $profile = User::findOrFail($id);
        $profile->update($request->all());
        return redirect()->route('admin.profile.index')->withResult([
            'message' => __('Admin.alerts.admin.update_admin', ['first_name' => $profile->first_name, 'last_name' => $profile->last_name]),
            'alert'   => 'success',
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
