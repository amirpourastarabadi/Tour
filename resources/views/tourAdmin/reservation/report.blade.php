@extends('layouts.tourAdmin')

@section('content')
    <div class="row"><h3>Tour Information:</h3></div>
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "From", "DATA" => $tour->origin])@endcomponent
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "To", "DATA" => $tour->destination])@endcomponent
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "Date", "DATA" => "{$tour->start_at}(leave) until {$tour->addToDate($tour->duration)}(comeback)"])@endcomponent
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "Price", "DATA" => $tour->prettyPrice($tour->price)])@endcomponent
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "Tickets", "DATA" => $count])@endcomponent
    <hr>
    @component('components.report',['WIDTH'=> 1,'TITLE'=> "Bill", "DATA" => $tour->prettyPrice($tour->price * $count)])@endcomponent


    <div class="row"><h3>Passenger Information:</h3></div>
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "First Name:", "DATA" => $user->first_name])@endcomponent
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "Last Name:", "DATA" => $user->last_name])@endcomponent
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "National Code:", "DATA" => $user->passenger->national_code])@endcomponent
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "Birthday:", "DATA" => $user->passenger->birthday])@endcomponent
    @component('components.report',['WIDTH'=> 2, 'TITLE'=> "Phone Number:", "DATA" => $user->mobile_number])@endcomponent

    <div class="row my-3">
        <a href="{{ route('tourAdmin.reservation.confirm', $count) }}" class="btn btn-success mx-3">Confirm</a>
        <a href="{{route('tourAdmin.reservation.cancel')}}" class="btn btn-danger ml-3"
           onclick="return confirm('Are you sure to cancel this reservation?'); ">
            Cancel
        </a>
    </div>
@endsection
