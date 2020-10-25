<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourAdminRequest;
use App\Models\Passenger;
use App\Models\TourAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TourAdminController extends Controller
{

    public function index()
    {
        $items = TourAdmin::paginate(10);
        return view("admin.tourAdmin.index", compact('items'));
    }


    public function create()
    {
        return view('admin.tourAdmin.create');
    }


    public function store(TourAdminRequest $request)
    {
        $pass = Str::random(10);
        $request['password'] = Hash::make($pass);
        $request['role'] = 'tourAdmin';
        $user = User::create($request->all());
        $user->tourAdmin()->create($request->all());

        return redirect()->route('admin.tourAdmins.index')->withResult([
            'message' => __('Admin.alerts.tourAdmin.create', [
                'first_name' => $user->first_name,
                'last_name'  => $user->last_name,
                'password'   => $pass,
            ]),
            'alert'   => 'success',
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $item = TourAdmin::findOrFail($id);
        return view('admin.tourAdmin.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $tourAdmin = TourAdmin::findOrFail($id);
        $tourAdmin->update($request->all());
        $tourAdmin->user->update($request->only(['first_name', 'last_name', 'mobile_number']));
        return redirect()->route('admin.tourAdmins.index')->withResult([
            'message' => __('Admin.alerts.tourAdmin.update', ['first_name' => $tourAdmin->user->first_name, 'last_name' => $tourAdmin->user->last_name]),
            'alert'   => 'success',
        ]);    }


    public function destroy($id)
    {
        $tour_admin = TourAdmin::findOrFail($id);
        $tour_admin->user->delete();
        $tour_admin->delete();
        return redirect()->back()->withResult([
            'message' => __('Admin.alerts.tourAdmin.delete', ['first_name' => $tour_admin->user->first_name, 'last_name' => $tour_admin->user->last_name]),
            'alert'   => 'danger',
        ]);
    }


    public function keyGenerate($id){
        $pass = Str::random(10);
        $tourAdmin = TourAdmin::findOrFail($id);
        $tourAdmin->user->password = Hash::make($pass);
        $tourAdmin->user->save();
        return redirect()->back()->withResult([
            'message' => __('Admin.alerts.admin.reset_password', ['password' => $pass]),
            'alert'   => 'primary',
        ]);
    }
}
