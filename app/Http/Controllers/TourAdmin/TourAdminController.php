<?php

namespace App\Http\Controllers\TourAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TourAdminController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('tourAdmin.dashboard', compact('user'));
    }

}
