@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h3 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{ __('Admin.list.first_name') }}: <span class="text-success"
                                                             style="font-size: large"><b>{{ $user->first_name }}</b></span>
                    <br/><br/>
                    {{ __('Admin.list.last_name') }}: <span class="text-success"
                                                            style="font-size: large"><b>{{ $user->last_name }}</b></span>
                    <br/><br/>
                    {{ __('Admin.list.mobile_number') }}: <span class="text-success"
                                                                style="font-size: large"><b>{{ $user->mobile_number }}</b></span>
                    <br/><br/>

                </div>
            </div>

            <a href="{{ route('admin.profile.edit', $user) }}" class="btn btn-success">
                {{ __('Admin.layout.edit') }}
            </a>


        </div>
    </div>
    {{--#TODO create modals--}}
@endsection
