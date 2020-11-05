<?php

namespace App\Http\Controllers\TourAdmin;

use App\Events\CheckUser;
use App\Events\PhoneVerification;
use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Models\Tour;
use App\Models\TourAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $tours = Tour::where('tour_admin_id', $agency->id)->with('hotel')->latest('id')->paginate(7);
        return view('tourAdmin.reservation.index', compact('tours'));
    }

    public function step1(Tour $tour)
    {
        if(! $tour->hasCapacity()){
            return back()->withErrors(['no_capacity' => "This tour has no capacity"]);
        }
        session()->forget('reservation');
        session()->put('reservation.tour', $tour);
        return view('tourAdmin.reservation.create', compact('tour'));
    }

    public function step2(Request $request)
    {
        if ($user = User::where('mobile_number', $request['mobile_number'])->first()) {
            session()->put('reservation.user', $user);
        } else {
            session()->put('reservation.user', $request['mobile_number']);
        }
        return view('tourAdmin.reservation.personalInformation');

    }

    public function store(Request $request)
    {
        event(new CheckUser(session()->get('reservation.user'), $request));
        return view('tourAdmin.reservation.report',
            [
                'tour' => session('reservation.tour'),
                'user' => session('reservation.user'),
                'count' => $request['count']
            ]);
    }

    public function show(Tour $reservation)
    {
        session()->flash('reservation');
        return view('tourAdmin.reservation.show', ["tour" => $reservation]);
    }

    public function cancel(){
        session()->flash('reservation');
        return redirect(route('tourAdmin.reservation.index'));
    }

    public function confirm($count){

        session('reservation.tour')->makeReservation(session()->get('reservation.user')->passenger, $count);
        return redirect(route('tourAdmin.reservation.show', session()->get('reservation.tour')));
    }

    public function destroy(Tour $tour, Passenger $passenger, $count){
        $tour->filled_num -= $count;
        $tour->save();
        DB::table('passenger_tour')
            ->where('tour_id', $tour->id)
            ->where('passenger_id', $passenger->id)
            ->delete();
        return back()->withErrors(['delete'=>"{$passenger->user->last_name} reservation has been canceled"]);


    }


}
