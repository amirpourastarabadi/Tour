<?php

namespace App\Http\Controllers\TourAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourCreationValidation;
use App\Models\Hotel;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::where('tour_admin_id', Auth::user()->id)->paginate(10);
        $count = ($tours->currentPage() - 1) * $tours->perPage() + 1;
        return view('tourAdmin.tour.list')->withTours($tours)->withCount($count);
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

        if (isset($request->service)) {
            foreach ($request->service as $key => $service) {
                $this->createTourServices($request, $tour, $key, $service);
            }
        }

        if (isset($request->beds)) {
            foreach ($request->beds as $key => $beds) {
                $this->createRoomServices($request, $tour, $key, $beds);
            }
        }

        if (isset($request->vehicle)) {
            foreach ($request->vehicle as $key => $vehicle) {
                $this->createTransportationServices($request, $tour, $key, $vehicle);
            }
        }

        return redirect()->route('tourAdmin.tour.index')->withResult([
            'message' => __('tourAdmin.alerts.tour.create', ['origin' => $tour->origin, 'destination' => $tour->destination]),
            'alert'   => 'success',
        ]);
    }

    public function show(Tour $tour)
    {
        return view('tourAdmin.tour.show')->withTour($tour);
    }

    public function edit(Tour $tour)
    {
        $hotels = Hotel::all();

        return view('tourAdmin.tour.edit')->withTour($tour)->withHotels($hotels);
    }

    public function update(TourCreationValidation $request, Tour $tour)
    {
        $tour->update($request->all());

        if (isset($request->add_tour_service)){
            foreach ($request->service as $key => $service) {
                if ($key >= (count($request->service) - count($request->add_tour_service))) {
                    $this->createTourServices($request, $tour, $key, $service);
                }
            }
        }

        if (isset($request->add_room_service)){
            foreach ($request->beds as $key => $beds) {
                if ($key >= (count($request->beds) - count($request->add_room_service))) {
                    $this->createRoomServices($request, $tour, $key, $beds);
                }
            }
        }

        if (isset($request->add_transportation_service)){
            foreach ($request->vehicle as $key => $vehicle) {
                if ($key >= (count($request->vehicle) - count($request->add_transportation_service))) {
                    $this->createTransportationServices($request, $tour, $key, $vehicle);
                }
            }
        }
        if (isset($request->delete_tour_services)) {
            foreach ($request->delete_tour_services as $key => $delete_tour_service) {
                if ($delete_tour_service == 1) {
                    $tour->tourServices[$key]->delete();
                } else {
                    $tour->tourServices[$key]->update($request->only([
                        'service[' . $key . ']',
                        'tour_service_price[' . $key . ']',
                    ]));
                }
            }
        }
        if (isset($request->delete_room_services)) {
            foreach ($request->delete_room_services as $key => $delete_room_service) {
                if ($delete_room_service == 1) {
                    $tour->roomServices[$key]->delete();
                } else {
                    $tour->roomServices[$key]->update($request->only([
                        'beds[' . $key . ']',
                        'room_type[' . $key . ']',
                        'room_service[' . $key . ']',
                        'room_service_price[' . $key . ']',
                    ]));
                }
            }
        }

        if (isset($request->delete_transportation_services)) {
            foreach ($request->delete_transportation_services as $key => $delete_transportation_service) {
                if ($delete_transportation_service == 1) {
                    $tour->transportationServices[$key]->delete();
                } else {
                    $tour->transportationServices[$key]->update($request->only([
                        'vehicle[' . $key . ']',
                        'transition_type[' . $key . ']',
                        'company[' . $key . ']',
                        'transition_service_price[' . $key . ']',
                        'origin_address[' . $key . ']',
                        'destination_address[' . $key . ']',
                        'departure_time[' . $key . ']',
                        'arrival_time[' . $key . ']',
                        'conditions[' . $key . ']',
                        'percentage_reduction[' . $key . ']',
                    ]));
                }
            }
        }

        return redirect()->route('tourAdmin.tour.index')->withResult([
            'message' => __('tourAdmin.alerts.tour.update', ['origin' => $tour->origin, 'destination' => $tour->destination]),
            'alert'   => 'success',
        ]);
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tourAdmin.tour.index')->withResult([
            'message' => __('tourAdmin.alerts.tour.delete', ['origin' => $tour->origin, 'destination' => $tour->destination]),
            'alert'   => 'danger',
        ]);
    }

    protected function createTransportationServices($request, $tour, $key, $vehicle){
        $transportationService['vehicle'] = $vehicle;
        $transportationService['transition_type'] = $request->transition_type[$key];
        $transportationService['company'] = $request->company[$key];
        $transportationService['transition_service_price'] = $request->transition_service_price[$key];
        $transportationService['origin_address'] = $request->origin_address[$key];
        $transportationService['destination_address'] = $request->destination_address[$key];
        $transportationService['departure_time'] = $request->departure_time[$key];
        $transportationService['arrival_time'] = $request->arrival_time[$key];
        $transportationService['conditions'] = $request->conditions[$key];
        $transportationService['percentage_reduction'] = $request->percentage_reduction[$key];
        $tour->transportationServices()->create($transportationService);
    }

    protected function createRoomServices($request, $tour, $key, $beds){
        $roomService['beds'] = $beds;
        $roomService['room_type'] = $request->room_type[$key];
        $roomService['room_service'] = $request->room_service[$key];
        $roomService['room_service_price'] = $request->room_service_price[$key];
        $tour->roomServices()->create($roomService);
    }

    protected function createTourServices($request, $tour, $key, $service){
        $tourService['service'] = $service;
        $tourService['tour_service_price'] = $request->tour_service_price[$key];
        $tour->tourServices()->create($tourService);
    }

}
