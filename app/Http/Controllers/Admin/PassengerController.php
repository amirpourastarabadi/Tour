<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassengerRequest;
use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{

    public function index()
    {
        $items = Passenger::all();
        return view('admin.passengers.index')->withItems($items);
    }


    public function create()
    {
        return view('admin.passengers.create');
    }


    public function store(PassengerRequest $request)
    {
        dd($request->toArray());
    }


    public function show($passenger)
    {
        dd($passenger);
    }


    public function edit(Passenger $passenger)
    {
        //
    }


    public function update(Request $request, Passenger $passenger)
    {
        //
    }


    public function destroy(Passenger $passenger)
    {
        //
    }
}
