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
        $items = Passenger::latest()->paginate(10);
        return view('admin.passengers.index')->withItems($items);
    }


    public function create()
    {
        return view('admin.passengers.create');
    }


    public function store(PassengerRequest $request)
    {

        Passenger::create($request->all());
        return redirect(route('admin.passengers.index'));
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
        $passenger->delete();
        return redirect(route('admin.passengers.index'));

    }


    public function keyGenerate(){
        //
    }
}
