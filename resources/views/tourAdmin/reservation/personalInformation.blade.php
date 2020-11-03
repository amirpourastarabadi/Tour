@extends('layouts.tourAdmin')

@section('content')
    @component('components.tour-information', ['TOUR' => session('reservation.tour')])
    @endcomponent

    @component('components.passenger-information', ["USER" => session('reservation.user')])
    @endcomponent
@endsection
