@extends('layouts.tourAdmin')

@section('content')
    <div class="content">
        {{--#TODO add search form--}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Tours</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    @component('components.table-head', [
                                                                            "headers" => [
                                                                                'Origin',
                                                                                'Destination',
                                                                                'Date',
                                                                                'Duration',
                                                                                'Price',
                                                                                'Total Capacity',
                                                                                'Free Capacity',
                                                                                'Operations'
                                                                            ]
                                                                        ])
                                    @endcomponent
                                    @component('components.table-body', ['tours' => $tours])
                                    @endcomponent

                                </table>
                                {{ $tours->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

@endsection


