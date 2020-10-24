@extends('layouts.superAdmin')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h3>{{ __('superAdmin.list.edit') }} | <span class="text-primary">{{ $admin->first_name }} {{ $admin->last_name }}</span></h3>
    <br/>
    <form action="{{ route('superAdmin.admin.update', $admin) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('superAdmin.list.first_name') }}</label>
                <input name="first_name" value="{{ $admin->first_name }}" type="text" class="form-control" placeholder="{{ __('superAdmin.list.first_name') }}">
            </div>

            <div class="form-group col-md-6">
                <label>{{ __('superAdmin.list.last_name') }}</label>
                <input name="last_name" value="{{ $admin->last_name }}" type="text" class="form-control" placeholder="{{ __('superAdmin.list.last_name') }}">
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>{{ __('superAdmin.list.mobile_number') }}</label>
                <input  name="mobile_number" value="{{ $admin->mobile_number }}" type="text" class="form-control" placeholder="{{ __('superAdmin.list.mobile_number') }}">
            </div>
        </div>
        <br/>
        <button type="submit" class="btn btn-success"
                onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_edit', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]) }}');">
            {{ __('superAdmin.edit.submit') }}
        </button>

        <a href="{{ route('superAdmin.admin.keyGenerate', $admin) }}" type="submit" class="btn btn-primary text-light"
            onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_key', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]) }}');">
            {{ __('superAdmin.list.key') }}
        </a>

        <a href="{{ route('superAdmin.admin.index') }}" type="submit" class="btn btn-danger text-light"
           onclick="return confirm('{{ __('superAdmin.alerts.admin.cancel_edit') }}');">
            {{ __('superAdmin.list.cancel') }}
        </a>

    </form>
    {{--#TODO create modals--}}
    {{--#TODO create validation--}}
@endsection
