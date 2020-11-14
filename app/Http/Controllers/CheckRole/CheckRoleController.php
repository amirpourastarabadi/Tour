<?php

namespace App\Http\Controllers\CheckRole;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckRoleController extends Controller
{
    public function checkRole()
    {
        switch (Auth::user()->role) {
            case 'superAdmin':
                return redirect()->route('superAdmin.profile.index');
            case 'admin':
                return redirect()->route('admin.index');
            case 'tourAdmin':
                return redirect()->route('tourAdmin.tourAdmin.index');
            case 'passenger':
                return redirect()->route('passenger.profile.index');
        }
    }
}
