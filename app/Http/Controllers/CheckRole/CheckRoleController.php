<?php

namespace App\Http\Controllers\CheckRole;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckRoleController extends Controller
{
    public function checkRole()
    {
        switch (Auth::user()->role) {
            case 'super_admin':
                return redirect()->route('superAdmin.index');
            case 'admin':
                return redirect()->route('admin.index');
            case 'tour_admin':
                return redirect()->route('tourAdmin.index');
            case 'customer':
                return redirect()->route('customer.index');
        }
    }
}
