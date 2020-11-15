@extends('layouts.navbar')

@section('main_content')
<div class="container">
    <h3>{{ __('passenger.register_completion.completion') }}</h3>
    <br/>
    <form action="{{ route('register.passenger.update', $passenger) }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('passenger.list.first_name') }}</label>
                <input value="{{ $passenger->first_name }}" type="text" class="form-control disabled text-gray">
            </div>

            <div class="form-group col-md-6">
                <label>{{ __('passenger.list.last_name') }}</label>
                <input value="{{ $passenger->last_name }}" type="text" class="form-control disabled text-gray">
            </div>
        </div>
        <br/>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>{{ __('passenger.list.mobile_number') }}</label>
                <input value="{{ $passenger->mobile_number }}" type="text" class="form-control disabled text-gray">
            </div>
        </div>

        <br/>
        <hr style="height: 2px; background-color: deeppink;"/>
        <br/>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label>{{ __('passenger.register_completion.email') }}</label>
                <input name="email" type="email" value="{{ old('email') }}" placeholder="{{ __('passenger.register_completion.email') }}" class="form-control col-8 @if($errors->passengerCompletion->first('email')) is-invalid @endif">
                @if($errors->passengerCompletion->first('email'))
                    <span class="container text-danger text-small" role="alert">
                        <strong>{{ $errors->passengerCompletion->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('passenger.register_completion.telephone_number') }}</label>
                <input name="telephone_number" value="{{ old('telephone_number') }}" type="text" placeholder="{{ __('passenger.register_completion.telephone_number_description') }}" class="form-control col-8 @if($errors->passengerCompletion->first('telephone_number')) is-invalid @endif">

                @if($errors->passengerCompletion->first('telephone_number'))
                    <span class="container text-danger text-small" role="alert">
                        <strong>{{ $errors->passengerCompletion->first('telephone_number') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <br/>

        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('passenger.register_completion.national_code') }}</label>
                <input name="national_code" value="{{ old('national_code') }}" type="text" placeholder="{{ __('passenger.register_completion.national_code') }}" class="form-control col-8 @if($errors->passengerCompletion->first('national_code')) is-invalid @endif">

                @if($errors->passengerCompletion->first('national_code'))
                    <span class="container text-danger text-small" role="alert">
                        <strong>{{ $errors->passengerCompletion->first('national_code') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-6">
                <label>{{ __('passenger.register_completion.birthday') }}</label>
                <input name="birthday" value="{{ old('birthday') }}" type="date" class="form-control col-8 @if($errors->passengerCompletion->first('birthday')) is-invalid @endif">
                @if($errors->passengerCompletion->first('birthday'))
                    <span class="container text-danger text-small" role="alert">
                        <strong>{{ $errors->passengerCompletion->first('birthday') }}</strong>
                    </span>
                @endif
            </div>

        </div>

        <br/>

        <button type="submit" class="btn btn-success"
                onclick="return confirm('{{ __('passenger.alerts.completion.confirm_completion') }}');">
            {{ __('passenger.edit.submit') }}
        </button>

        <a href="{{ route('index') }}" type="submit" class="btn btn-danger text-light"
           onclick="return confirm('{{ __('passenger.alerts.completion.cancel_completion') }}');">
            {{ __('passenger.list.cancel') }}
        </a>

    </form>
</div>
@endsection
