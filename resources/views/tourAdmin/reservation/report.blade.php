@extends('layouts.tourAdmin')

@section('content')
    <div class="row"><h3>Tour Information:</h3></div>
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "From", "DATA" => $tour->origin])@endcomponent
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "To", "DATA" => $tour->destination])@endcomponent
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "Date", "DATA" => "{$tour->start_at}(leave) until {$tour->addToDate($tour->duration)}(comeback)"])@endcomponent
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "Price", "DATA" => $tour->prettyPrice()])@endcomponent

    <div class="row"><h3>Passenger Information:</h3></div>
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "First Name:", "DATA" => $user->first_name])@endcomponent
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "Last Name:", "DATA" => $user->last_name])@endcomponent
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "National Code:", "DATA" => $user->passenger->national_code])@endcomponent
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "Birthday:", "DATA" => $user->passenger->birthday])@endcomponent
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "Phone Number:", "DATA" => $user->mobile_number])@endcomponent

    <div class="row my-3">
        <a href="" class="btn btn-info mx-3">Tour's Passengers</a>
        <a href="{{route('tourAdmin.reservation.index')}}" class="btn btn-success">Reservation Page</a>
    </div>
@endsection
