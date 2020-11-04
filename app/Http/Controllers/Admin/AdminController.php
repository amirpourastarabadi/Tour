<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Models\TourAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function index()
    {
        $passengers = Passenger::count();
        $tour_admins = User::where('role' , 'tourAdmin')->count();
        return view('admin.dashboard', compact('passengers', 'tour_admins'));
    }

    public function keyGenerate($id){
        $pass = Str::random(10);
        $profile = User::findOrFail($id);
        $profile->password = Hash::make($pass);
        $profile->save();

        return redirect()->back()->withResult([
            'message' => __('Admin.alerts.admin.reset_password', ['password' => $pass]),
            'alert'   => 'primary',
        ]);
    }
}
