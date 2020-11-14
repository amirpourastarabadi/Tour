@extends('layouts.passenger')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h3 class="card-title">{{ $passenger->first_name }}, {{$passenger->last_name}}</h3>
                    </div>
                </div>
                <div class="card-body">

                    {{ __('passenger.list.first_name') }}: <span class="text-success" style="font-size: large"><b>{{ $passenger->first_name }}</b></span>
                    <br/><br/>

                    {{ __('passenger.list.last_name') }}: <span class="text-success" style="font-size: large"><b>{{$passenger->last_name}}</b></span>
                    <br/><br/>

                    {{ __('passenger.list.mobile_number') }}: <span class="text-success" style="font-size: large"><b>{{ $passenger->mobile_number }}</b></span>
                    <br/><br/>

                    {{ __('passenger.register_completion.email') }}: <span class="text-success" style="font-size: large"><b>{{ $passenger->passenger->email }}</b></span>
                    <br/><br/>

                    {{ __('passenger.register_completion.national_code') }}: <span class="text-success" style="font-size: large"><b>{{ $passenger->passenger->national_code }}</b></span>
                    <br/><br/>

                    {{ __('passenger.register_completion.birthday') }}: <span class="text-success" style="font-size: large"><b>{{ $passenger->passenger->birthday }}</b></span>
                    <br/><br/>

                    {{ __('passenger.register_completion.telephone_number') }}: <span class="text-success" style="font-size: large"><b>{{ $passenger->passenger->telephone_number }}</b></span>
                    <br/><br/>

                </div>
            </div>

            <a href="{{ route('passenger.profile.edit', $passenger) }}" type="submit" class="btn btn-success"
               onclick="return confirm('{{ __('passenger.alerts.profile.edit') }}');">
                {{ __('passenger.profile.edit') }}
            </a>

        </div>
    </div>
@endsection
