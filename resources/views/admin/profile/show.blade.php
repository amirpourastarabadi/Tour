@extends('layouts.admin')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-primary">
                        <div class="card-text">
                            <h3 class="card-title">{{ $superAdmin->first_name }} {{ $superAdmin->last_name }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ __('superAdmin.list.first_name') }}: <span class="text-success" style="font-size: large"><b>{{ $superAdmin->first_name }}</b></span>
                        <br/><br/>
                        {{ __('superAdmin.list.last_name') }}: <span class="text-success" style="font-size: large"><b>{{ $superAdmin->last_name }}</b></span>
                        <br/><br/>
                        {{ __('superAdmin.list.mobile_number') }}: <span class="text-success" style="font-size: large"><b>{{ $superAdmin->mobile_number }}</b></span>
                        <br/><br/>
                        {{ __('superAdmin.list.admins_count') }}: <span class="text-success" style="font-size: large"><b>{{ $adminsCount }}</b></span>
                        <br/>
                    </div>
                </div>

                <a href="{{ route('superAdmin.profile.edit', $superAdmin) }}" type="submit" class="btn btn-success"
                    onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_edit', ['first_name' => $superAdmin->first_name, 'last_name' => $superAdmin->last_name]) }}');">
                    {{ __('superAdmin.layout.edit') }}
                </a>

                <a href="{{ route('superAdmin.admin.index') }}" type="submit" class="btn btn-primary text-light"
                    onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_back') }}');">
                    {{ __('superAdmin.layout.admins_list') }}
                </a>

            </div>
        </div>
    {{--#TODO create modals--}}
@endsection
