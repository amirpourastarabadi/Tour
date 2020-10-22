<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return 'create';
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        return 'show';
    }


    public function edit(User $user)
    {
        dd($user);
    }


    public function update(Request $request, User $user)
    {
        return 'update';
    }


    public function destroy(User $user)
    {
        dd($user);
        return redirect()->route('superAdmin.index');
    }


    public function editProfile(User $user)
    {
        return 'edit profile';
    }

    public function keyGenerate(User $user)
    {
        return 'keyGenerate';
    }
}
