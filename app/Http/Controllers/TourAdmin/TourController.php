<?php

namespace App\Http\Controllers\TourAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourCreationValidation;
use App\Models\Hotel;
use App\Models\Tour;
use App\Models\TourServices;
use App\Models\TransportationServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $hotels = Hotel::all();

        return view('tourAdmin.tour.create')->withHotels($hotels);
    }

    public function store(TourCreationValidation $request)
    {
        $request['tour_admin_id'] = Auth::user()->id;

        $tour = Tour::create($request->all());
//        dd($request->all());

        foreach ($request->service as $key => $service){
            $tourService['service'] = $service;
            $tourService['tour_service_price'] = $request->tour_service_price[$key];
            $tour->tourServices()->create($tourService);
        }

        foreach ($request->beds as $key => $beds){
            $roomService['beds'] = $beds;
            $roomService['room_type'] = $request->room_type[$key];
            $roomService['room_service'] = $request->room_service[$key];
            $roomService['room_service_price'] = $request->room_service_price[$key];
            $tour->roomServices()->create($roomService);
        }

        foreach ($request->vehicle as $key => $vehicle){
            $transportationService['vehicle'] = $vehicle;
            $transportationService['transition_type'] = $request->transition_type[$key];
            $transportationService['company'] = $request->company[$key];
            $transportationService['transition_service_price'] = $request->transition_service_price[$key];
            $transportationService['origin_address'] = $request->origin_address[$key];
            $transportationService['destination_address'] = $request->destination_address[$key];
            $transportationService['departure_time'] = $request->departure_time[$key];
            $transportationService['arrival_time'] = $request->arrival_time[$key];
            dd($a = Carbon::createFromFormat('Y-m-d H:i:s', $transportationService['arrival_time']));
            dd($transportationService);
            $transportationService['conditions'] = $request->conditions[$key];
            $transportationService['percentage_reduction'] = $request->percentage_reduction[$key];
            $tour->transportationServices()->create($transportationService);
        }
    }

    public function show(Tour $tour)
    {
        //
    }

    public function edit(Tour $tour)
    {
        //
    }

    public function update(Request $request, Tour $tour)
    {
        //
    }

    public function destroy(Tour $tour)
    {
        //
    }
}
