<?php

namespace App\Http\Controllers\TourAdmin;

use App\Events\CheckUser;
use App\Events\PhoneVerification;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Tour;
use App\Models\TourAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Predis\Client;

class ReservationController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        $agency = TourAdmin::where('user_id', Auth::user()->id)->get()->first();
        $tours = Tour::where('tour_admin_id', $agency->id)->with('hotel')->latest('id')->paginate(5);
        return view('tourAdmin.reservation.index', compact('tours'));
    }

    public function create(Tour $tour)
    {
        request()->session()->put('reservation.tour', $tour);
        return view('tourAdmin.reservation.create', compact('tour'));
    }

    public function store(Request $request)
    {
        dd(session()->get('reservation'));
        event(new CheckUser(session()->get('reservation.user')));
//        $tour->makeReservation($user, $request);
        return view('tourAdmin.reservation.report', compact('tour', 'user'));
    }

    public function show(Tour $reservation)
    {
        return view('tourAdmin.reservation.show', ["tour" => $reservation]);
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

    public function step2(Request $request)
    {
        $request->session()->flash('reservation.user');
        if($user = User::where('mobile_number', $request['mobile_number'])->first()){
            $request->session()->put('reservation.user', $user);
        }
        return view('tourAdmin.reservation.personalInformation');

    }


}
