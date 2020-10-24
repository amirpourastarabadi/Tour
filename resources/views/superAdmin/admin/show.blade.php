@extends('layouts.superAdmin')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-primary">
                        <div class="card-text">
                            <h3 class="card-title">{{ $admin->first_name }} {{ $admin->last_name }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ __('superAdmin.list.first_name') }}: <span class="text-success" style="font-size: large"><b>{{ $admin->first_name }}</b></span>
                        <br/><br/>
                        {{ __('superAdmin.list.last_name') }}: <span class="text-success" style="font-size: large"><b>{{ $admin->last_name }}</b></span>
                        <br/><br/>
                        {{ __('superAdmin.list.mobile_number') }}: <span class="text-success" style="font-size: large"><b>{{ $admin->mobile_number }}</b></span>
                    <br/>
                    </div>
                </div>

                <form action="{{ route('superAdmin.admin.destroy', $admin) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('superAdmin.admin.keyGenerate', $admin) }}" type="submit" class="btn btn-primary text-light"
                       onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_key', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]) }}');">
                       {{ __('superAdmin.list.key') }}
                    </a>

                    <a href="{{ route('superAdmin.admin.edit', $admin) }}" type="submit" class="btn btn-success"
                            onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_edit', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]) }}');">
                            {{ __('superAdmin.list.edit') }}
                    </a>

                    <a href="{{ route('superAdmin.admin.index') }}" type="submit" class="btn btn-info text-light"
                       onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_back') }}');">
                        {{ __('superAdmin.list.back') }}
                    </a>

                    <button type="submit" class="btn btn-danger text-light float-right"
                       onclick="return confirm('{{ __('superAdmin.list.confirm_delete', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]) }}');">
                       {{ __('superAdmin.list.delete') }}
                    </button>
                </form>
            </div>
        </div>
    {{--#TODO create modals--}}
@endsection
