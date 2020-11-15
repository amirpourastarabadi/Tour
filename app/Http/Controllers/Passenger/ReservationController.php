<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $tours = Auth::user()->passenger->tours;
        return view('passenger.reservation.list')->withTours($tours);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tour $reservation)
    {
        return view('passenger.reservation.show')->withTour($reservation);
    }

    public function edit(Passenger $passenger)
    {
        //
    }

    public function update(Request $request, Passenger $passenger)
    {
        //
    }

    public function destroy(Passenger $reservation)
    {
        //
    }
}
