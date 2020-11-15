<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $services = DB::table('passenger_tour')->where(['passenger_id' => Auth::user()->passenger->id, 'tour_id' => $reservation->id])->first();
        $room_service = $reservation->roomService($services->room_service_id);
        $transportation_service = $reservation->transportationService($services->transportation_service_id);

        $tour_services = DB::table('reservation_service')->select('tour_services_id')->where('reservation_id', $services->id)->get()->pluck('tour_services_id');
        $tour_services = $reservation->tourServices2($tour_services->toArray());

        return view('passenger.reservation.show')
            ->withRoomService($room_service)
            ->withTransportationService($transportation_service)
            ->withTourServices($tour_services)
            ->withTour($reservation);
    }

    public function edit(Passenger $passenger)
    {
        //
    }

    public function update(Request $request, Passenger $passenger)
    {
        //
    }

    public function destroy(Tour $reservation)
    {
        $services = DB::table('passenger_tour')->where(['passenger_id' => Auth::user()->passenger->id, 'tour_id' => $reservation->id])->first();

        $reservation->filled_num -= $services->count;
        $reservation->save();

        DB::table('passenger_tour')
            ->where('id', $services->id)
            ->delete();

        return redirect()->route('passenger.reservation.index')->withResult([
            'message' => __('passenger.alerts.tour.tour_canceled'),
            'alert'   => 'danger',
        ]);
    }
}
