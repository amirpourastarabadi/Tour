@extends('layouts.tourAdmin')

@section('content')

    @component('components.tour-information', ['TOUR' => $tour])
    @endcomponent

    <form action="{{ route('tourAdmin.reservation.update', ['tour' => $tour, 'passenger' => $passenger]) }}" method="post" style="display: inline">
        @csrf
        @method('put')
        <h3>Ticket Information</h3>
        <div class="alert alert-info">You can change your ticket number or cancel this reservation completely</div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>First Name</label>
                <input name="first_name" id="first_name"
                       value="{{$passenger->user->first_name}}"
                       type="text"
                       class="form-control" required>
                @error('first_name') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input name="last_name" id="last_name"
                       value="{{$passenger->user->last_name}}"
                       type="text"
                       class="form-control" required>
                @error('last_name') <span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>National Code</label>
                <input name="national_code" id="national_code"
                       value="{{$passenger->national_code}}"
                type="text"
                class="form-control" required>
                @error('national_code') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group col-md-6">
                <label>Birth Day</label>
                <input name="birthday" id="birthday"
                       value="{{$passenger->birthday}}"
                       type="date" class="form-control" required>
                @error('birthday') <span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Number Of Tickets</label>
                <input name="count" type="number" value="{{$count}}" max="{{$tour->total_num - ($tour->filled_num - $count)}}" required
                       class="form-control">
                @error('count') <span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success" id="submit"
                onclick="return confirm('Do you confirm these information?');">
            Update
        </button>
    </form>
    <form
        action="{{route('tourAdmin.reservation.destroy', [
    'tour' => $tour, 'passenger' => $passenger, 'count' => $count
    ])}}"
        method="post" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
                title="Cancel">
            Cancel
        </button>
    </form>


@endsection
