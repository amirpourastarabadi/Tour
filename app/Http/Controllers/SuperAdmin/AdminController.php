<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->paginate(5);
        $count = 1;
        return view('superAdmin.admin.list')->withAdmins($admins)->withCount($count);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
