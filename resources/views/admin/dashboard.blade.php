@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h3 class="card-title">
                            Hello {{\Illuminate\Support\Facades\Auth::user()->first_name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <h3>You can manage</h3>
                    <h5>{{$passengers}} Passengers and</h5>
                    <h5>{{$tour_admins}} Tour agency</h5>
                    <h3>From this panel</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
