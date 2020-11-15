<?php

namespace App\Http\Controllers\InterfaceZone;

use App\Events\CheckUser;
use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InterfaceZoneController extends Controller
{
    use RegistersUsers;

    public function index()
    {
        $request = request();
        $tours = Tour::search(request());
        session()->put('search.tour', $tours);
        session()->put('search.query', request()->query());
        return view('interfaceZone.index', compact('tours', 'request'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $tour)
    {

        if ($reservation = DB::table('passenger_tour')->insertGetId([
            'passenger_id' => Auth::user()->passenger->id,
            'transportation_service_id' => $request['transportation_service'] ?? null,
            'room_service_id' => $request['room_service'] ?? null,
            'tour_id' => $tour,
            'count' => $request['count'],
        ])) {
            $tour = Tour::find($tour);
            $tour->filled_num += $request['count'];
            $tour->save();
        }
        if ($request['tour_service']) {
            foreach ($request['tour_service'] as $item) {
                DB::table('reservation_service')->insert([
                    'reservation_id' => $reservation,
                    'tour_services_id' => $item,
                ]);
            }
        }
        $roomService = $tour->roomService($request['room_service']);
        $transportationService = $tour->transportationService($request['transportation_service']);
        $tourServices = $tour->tourServices2($request['tour_service']);
        return view('interfaceZone.report', (compact('reservation', 'tour', 'request', 'roomService',
            'transportationService', 'tourServices')));
    }

    public function show($id)
    {
        return view("interfaceZone.show", ['tour' => Tour::find($id)]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $tour)
    {
        if (!$request['stars']) {
            $request['stars'] = [1, 2, 3, 4, 5];
        }
        if (!$request['min_price']) {
            $request['min_price'] = 0;
        }
        if (!$request['max_price']) {
            $request['max_price'] = 99999999;
        }
        session()->put('search.tour', session('search.tour')->filter(function ($value, $key) {
            return (in_array($value->hotel->stars, \request('stars')) && (\request('min_price') <= $value->price && $value->price <= \request('max_price')));
        }));
        return view('interfaceZone.index', ['tours' => session('search.tour')]);
    }

    public function destroy($id)
    {
        //
    }

    public function verification(Request $request)
    {
        if (session('verification')) {
            $this->guard()->login(session('tmp_user'));
            session()->flash('tmp_user', 'verification');
//            session()->put('user', session('tmp_user')[0]);
            return back();
        }

        $user = event(new CheckUser($request))[0];
        session()->put('tmp_user', $user);
        session()->put('verification', Str::random(10));
        return back();
    }
}
