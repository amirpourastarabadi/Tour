<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Models\TourAdmin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $passengers = Passenger::all();
        $tour_admins = TourAdmin::all();
        return view('admin.dashboard', compact('passengers', 'tour_admins'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function keyGenerate(){
        //
    }
}
