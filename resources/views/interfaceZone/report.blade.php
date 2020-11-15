@extends('layouts.navbar')
@push('css')
    <style>
        h3, h5  {
            color: purple;
        }
    </style>
@endpush
@section('main_content')

    <div class="container">
        <div class="row">
            <div class="alert alert-success w-100 text-center">
                Thanks for your shop "{{session('user')[0]->first_name.", ".session('user')[0]->last_name}}"
            </div>
        </div>
        <div class="row">
            <h3>Your Shop Report</h3>
        </div>
        <hr>
        <div class="row mb-3">
            <div class="col-12">
                <h3>Tour Information:</h3>
            </div>
            <div class="col-3">From: <b>{{$tour->origin}}</b></div>
            <div class="col-3">To: <b>{{$tour->destination}}</b></div>
            <div class="col-3">On: <b>{{$tour->start_at}}</b></div>
            <div class="col-3">For <b>{{$tour->duration}}</b> Day</div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h3>Hotel Information:</h3>
            </div>
            <div class="col-3">Hotel <b>{{$tour->hotel->name}}</b></div>
            <div class="col-3">Stars @for($i = 1; $i <= $tour->hotel->stars; $i++)
                    <i class="material-icons text-warning">star_rate</i> @endfor</div>
            <div class="col-6">Address <b>{{$tour->hotel->address}}</b></div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h3>Optional Services:</h3>
            </div>
            <div class="col-12 mt-3">
                <h5><b>Room Service:</b></h5>
            </div>
            <div class="col-3">Beds: <b>{{$roomService->beds}}</b></div>
            <div class="col-3">Room Type: <b>{{$roomService->room_type}}</b></div>
            <div class="col-3">Service: <b>{{$roomService->room_service}}</b></div>
            <div class="col-3">Price: <b>{{$tour->prettyPrice($roomService->room_service_price)}}</b></div>
            <hr>
            <div class="col-12 mt-3">
                <h5><b>Tour Services:</b></h5>
            </div>
            @foreach($tourServices as $service)
                <div class="col-9">Service: <b>{{$service->service}}</b></div>
                <div class="col-3">Price: <b>{{$tour->prettyPrice($service->tour_service_price)}}</b></div>
            @endforeach
            <hr>
            <div class="col-12 mt-3 mb-3">
                <h5><b>Transportation Service:</b></h5>
            </div>
                <div class="col-4"> Vehicle: <b>{{$transportationService->vehicle}}</b></div>
                <div class="col-4"> Type: <b>{{$transportationService->transition_type}}</b></div>
                <div class="col-4"> Company: <b>{{$transportationService->company}}</b></div>
                <div class="col-6"> Origin Address: <b>{{$transportationService->origin_address}}</b></div>
                <div class="col-6"> Destination Address: <b>{{$transportationService->destination_address}}</b></div>
                <div class="col-6"> Departure Time: <b>{{$transportationService->departure_time}}</b></div>
                <div class="col-6"> Arrival Time: <b>{{$transportationService->arrival_time}}</b></div>
                <div class="col-4"> Condition: <b>{{$transportationService->condition}}</b></div>
                <div class="col-4"> Percentage Reduction: <b>{{$transportationService->percentage_reduction}}</b></div>
                <div class="col-4"> Price: <b>{{$transportationService->transition_service_price}}</b></div>
            </div>
        <a href="" class="btn btn-info">Profile</a>
        <a href="{{url('/')}}" class="btn btn-success">Home</a>
    </div>

    </div>

@endsection
