<?php

namespace App\Http\Controllers\TourAdmin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Predis\Client;

class ReservationController extends Controller
{
    public function index()
    {
        $agency = TourAdmin::where('user_id', Auth::user()->id)->get()->first();
        $tours = Tour::where('tour_admin_id', $agency->id)->with('hotel')->latest('id')->paginate(5);
        return view('tourAdmin.reservation.index', compact('tours'));
    }

    public function create(Tour $tour)
    {
        $client = new Client();
        $client->set('name', \request()->input('phone_number'));
        return view('tourAdmin.reservation.create', compact('tour'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

    }

    public function phoneVerification(){


    }
}
