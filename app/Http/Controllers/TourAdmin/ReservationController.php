<?php

namespace App\Http\Controllers\TourAdmin;

use App\Events\PhoneVerification;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Tour;
use App\Models\TourAdmin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Predis\Client;
use App\Events\CheckUser;

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
        return view('tourAdmin.reservation.create', compact('tour'));
    }

    public function store(ReservationRequest $request, Tour $tour)
    {
        if($request['password'] != $this->client->get($request['mobile_number'])){
            return back()->withErrors(['invalid' => 'this key is not valid'])->withInput();
        }
        $request['password'] = Hash::make($request['password']);
        $user = User::find(event(new CheckUser($request))[0]['id']);
        $tour->makeReservation($user, $request);
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

    public function phoneVerification()
    {
        $phone_number = \request()->input('phone_number');
        $data['result'] = Str::random(7);
        $this->client->set($phone_number, $data['result']);
        event(new PhoneVerification($phone_number));
        if($user = User::where('mobile_number', $phone_number)->first()){
            return [$user, $user->passenger, $data];
        }
        return false;
    }

    public function check(){
        if(\request()->input('password') === $this->client->get(\request()->input('phone_number'))){
            return true;
        }
        return false;
    }




}
