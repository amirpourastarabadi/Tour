@extends('layouts.tourAdmin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title ">Tour Report</h3>
                            <h4>"{{ $tour->origin }}" to "{{$tour->destination}}" on "{{ $tour->start_at }}"</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    @component('components.table-head', [
                                                                            "headers" => [
                                                                                'Passenger',
                                                                                'Phone Number',
                                                                                'Reserve Date',
                                                                                'Count',
                                                                                'Operations'
                                                                            ]
                                                                        ])
                                    @endcomponent
                                    @component('components.tour-table-body', ['tour' => $tour])
                                    @endcomponent

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

@endsection

