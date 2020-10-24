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

    <h3>{{ __('superAdmin.layout.edit') }} | <span class="text-primary">{{ $superAdmin->first_name }} {{ $superAdmin->last_name }}</span></h3>
    <br/>
    <form action="{{ route('superAdmin.profile.update', $superAdmin) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('superAdmin.list.first_name') }}</label>
                <input name="first_name" value="{{ $superAdmin->first_name }}" type="text" class="form-control" placeholder="{{ __('superAdmin.list.first_name') }}">
            </div>

            <div class="form-group col-md-6">
                <label>{{ __('superAdmin.list.last_name') }}</label>
                <input name="last_name" value="{{ $superAdmin->last_name }}" type="text" class="form-control" placeholder="{{ __('superAdmin.list.last_name') }}">
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>{{ __('superAdmin.list.mobile_number') }}</label>
                <input  name="mobile_number" value="{{ $superAdmin->mobile_number }}" type="text" class="form-control" placeholder="{{ __('superAdmin.list.mobile_number') }}">
            </div>
        </div>
        <br/>

        <button type="submit" class="btn btn-success"
                onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_edit', ['first_name' => $superAdmin->first_name, 'last_name' => $superAdmin->last_name]) }}');">
            {{ __('superAdmin.edit.submit') }}
        </button>

        <a href="{{ route('superAdmin.profile.keyGenerate', $superAdmin) }}" type="submit" class="btn btn-primary text-light"
           onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_key', ['first_name' => $superAdmin->first_name, 'last_name' => $superAdmin->last_name]) }}');">
            {{ __('superAdmin.list.key') }}
        </a>

        <a href="{{ route('superAdmin.profile.index') }}" type="submit" class="btn btn-danger text-light"
           onclick="return confirm('{{ __('superAdmin.alerts.admin.cancel_edit') }}');">
            {{ __('superAdmin.list.cancel') }}
        </a>

    </form>
    {{--#TODO create modals--}}
    {{--#TODO create validation--}}
@endsection
