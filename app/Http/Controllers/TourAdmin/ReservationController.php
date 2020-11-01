<?php

namespace App\Http\Controllers\TourAdmin;

use App\Events\PhoneVerification;
use App\Http\Controllers\Controller;
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

    public function store(Request $request, Tour $tour)
    {
        $request->validate([
            'national_code' => 'bail|required|string|size:10',
            'mobile_number' => 'bail|required',
            'first_name' => 'bail|required|min:3|string|max:255',
            'last_name' => 'bail|required|string|min:3|max:255',
            'birthday' => 'bail|required|date',
            'password' => 'bail|required',
        ]);

        $request['password'] = Hash::make($request['password']);
        $user = User::find(event(new CheckUser($request))[0]['id']);
        $tour->makeReservation($user);
        return view('tourAdmin.reservation.report', compact('tour', 'user'));
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

    public function phoneVerification()
    {
        $phone_number = \request()->input('phone_number');
        $data = Str::random(7);
        $this->client->set($phone_number, $data);
        event(new PhoneVerification($phone_number));
        if($user = User::where('mobile_number', $phone_number)->first()){
            return [$user, $user->passenger];
        }
        return $data;
    }


}
