@extends('layouts.tourAdmin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h3 class="card-title">
                            {{__('tourAdmin.layout.hi')}} {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection
