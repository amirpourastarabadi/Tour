@extends('layouts.tourAdmin')

@section('content')
    <form action="{{ route('tourAdmin.reservation.step2') }}" method="POST">
        @csrf
        @component('components.tour-information', ['TOUR' => $tour])
        @endcomponent
        <br/>
        <fieldset>
            <legend>Passenger</legend>
            <div class="form-row mt-3">
                <div class="form-group col-md-3">
                    <label>Telephone Number</label>
                    <input id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" type="text"
                           class="form-control">
                    @error('mobile_number') <span class="text-danger">{{$message}}</span>@enderror
                </div>
            </div>
            <button id="submit" type="submit" class="btn btn-success"> Next</button>

        </fieldset>
    </form>
@endsection
