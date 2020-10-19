<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        dd();
    }


    public function store(Request $request)
    {
        //
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
