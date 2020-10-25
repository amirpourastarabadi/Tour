<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassengerRequest;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PassengerController extends Controller
{

    public function index()
    {
        $items = Passenger::paginate(10);
        return view('admin.passengers.index')->withItems($items);
    }


    public function create()
    {
        return view('admin.passengers.create');
    }


    public function store(Request $request)
    {
        $pass = Str::random(10);
        $request['password'] = Hash::make($pass);
        $request['role'] = 'customer';

        $user = User::create($request->all());
        $user->passenger()->create($request->all());

        return redirect()->route('admin.passengers.index')->withResult([
            'message' => __('Admin.alerts.passenger.create', [
                'first_name' => $user->first_name,
                'last_name'  => $user->last_name,
                'password'   => $pass,
            ]),
            'alert'   => 'success',
        ]);
    }


    public function show($passenger)
    {
        dd($passenger);
    }


    public function edit(Passenger $passenger)
    {
        return view('admin.passengers.edit')->withPassenger($passenger);
    }


    public function update(Request $request, Passenger $passenger)
    {
        $passenger->update($request->all());
        return redirect(route('admin.passengers.index'));
    }


    public function destroy(Passenger $passenger)
    {
        $passenger->user()->delete();
        $passenger->delete();
        return redirect(route('admin.passengers.index'));

    }


    public function keyGenerate($id){
        $pass = Str::random(10);
        $passenter = Passenger::findOrFail($id);
        $passenter->user->password = Hash::make($pass);
        $passenter->save();
        return redirect()->back()->withResult([
            'message' => __('Admin.alerts.admin.reset_password', ['password' => $pass]),
            'alert'   => 'primary',
        ]);
    }
}
