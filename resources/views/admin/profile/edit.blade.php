@extends('layouts.admin')

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

    <h3>{{ __('Admin.layout.edit') }}</h3>
    <br/>
    <form action="{{ route('admin.profile.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('Admin.list.first_name') }}</label>
                <input name="first_name" value="{{ $user->first_name }}" type="text" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>{{ __('Admin.list.last_name') }}</label>
                <input name="last_name" value="{{ $user->last_name }}" type="text" class="form-control">
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>{{ __('Admin.list.mobile_number') }}</label>
                <input  name="mobile_number" value="{{ $user->mobile_number }}" type="text" class="form-control">
            </div>
        </div>
        <br/>

        <button type="submit" class="btn btn-success"
                onclick="return confirm('{{ __('Admin.alerts.admin.confirm_edit', ['first_name' => $user->first_name, 'last_name' => $user->last_name]) }}');">
            {{ __('Admin.edit.submit') }}
        </button>

        <a href="{{ route('admin.profile.keyGenerate', $user) }}" class="btn btn-primary text-light"
           onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_key', ['first_name' => $user->first_name, 'last_name' => $user->last_name]) }}');">
            {{ __('Admin.list.key') }}
        </a>

        <a href="{{ route('admin.profile.index') }}" type="submit" class="btn btn-danger text-light"
           onclick="return confirm('{{ __('Admin.alerts.admin.cancel_edit') }}');">
            {{ __('Admin.list.cancel') }}
        </a>

    </form>
    {{--#TODO create modals--}}
    {{--#TODO create validation--}}
@endsection
