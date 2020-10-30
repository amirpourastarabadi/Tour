@extends('layouts.navbar')

@section('main_content')
<div class="container">
    <h3>{{ __('tourAdmin.register_completion.completion') }}</h3>
    <br/>
    <form action="{{ route('register.tourAdmin.update', $tourAdmin) }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('tourAdmin.list.first_name') }}</label>
                <input value="{{ $tourAdmin->first_name }}" type="text" class="form-control disabled text-gray">
            </div>

            <div class="form-group col-md-6">
                <label>{{ __('tourAdmin.list.last_name') }}</label>
                <input value="{{ $tourAdmin->last_name }}" type="text" class="form-control disabled text-gray">
            </div>
        </div>
        <br/>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>{{ __('tourAdmin.list.mobile_number') }}</label>
                <input value="{{ $tourAdmin->mobile_number }}" type="text" class="form-control disabled text-gray">
            </div>
        </div>

        <br/>
        <hr style="height: 2px; background-color: deeppink;"/>
        <br/>

        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('tourAdmin.register_completion.agency') }}</label>
                <input name="agency" type="text" placeholder="{{ __('tourAdmin.register_completion.agency') }}" class="form-control col-8 @if($errors->tourAdminCompletion->first('agency')) is-invalid @endif">

                @if($errors->tourAdminCompletion->first('agency'))
                    <span class="container text-danger text-small" role="alert">
                        <strong>{{ $errors->tourAdminCompletion->first('agency') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-6">
                <label>{{ __('tourAdmin.register_completion.start_at') }}</label>
                <input name="start_at" type="date" class="form-control col-8 @if($errors->tourAdminCompletion->first('start_at')) is-invalid @endif">
                @if($errors->tourAdminCompletion->first('start_at'))
                    <span class="container text-danger text-small" role="alert">
                        <strong>{{ $errors->tourAdminCompletion->first('start_at') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <br/>

        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('tourAdmin.register_completion.guild_code') }}</label>
                <input name="guild_code" type="text" placeholder="{{ __('tourAdmin.register_completion.guild_code') }}" class="form-control col-8 @if($errors->tourAdminCompletion->first('guild_code')) is-invalid @endif">

                @if($errors->tourAdminCompletion->first('guild_code'))
                    <span class="container text-danger text-small" role="alert">
                        <strong>{{ $errors->tourAdminCompletion->first('guild_code') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-6">
                <label>{{ __('tourAdmin.register_completion.email') }}</label>
                <input name="email" type="email" placeholder="{{ __('tourAdmin.register_completion.email') }}" class="form-control col-8 @if($errors->tourAdminCompletion->first('email')) is-invalid @endif">
                @if($errors->tourAdminCompletion->first('email'))
                    <span class="container text-danger text-small" role="alert">
                        <strong>{{ $errors->tourAdminCompletion->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <br/>

        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>{{ __('tourAdmin.register_completion.telephone_number') }}</label>
                <input name="telephone_number" type="text" placeholder="{{ __('tourAdmin.register_completion.telephone_number_description') }}" class="form-control col-8 @if($errors->tourAdminCompletion->first('telephone_number')) is-invalid @endif">

                @if($errors->tourAdminCompletion->first('telephone_number'))
                    <span class="container text-danger text-small" role="alert">
                        <strong>{{ $errors->tourAdminCompletion->first('telephone_number') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <br/>

        <button type="submit" class="btn btn-success"
                onclick="return confirm('{{ __('tourAdmin.alerts.completion.confirm_completion') }}');">
            {{ __('tourAdmin.edit.submit') }}
        </button>

        <a href="{{ route('index') }}" type="submit" class="btn btn-danger text-light"
           onclick="return confirm('{{ __('tourAdmin.alerts.completion.cancel_completion') }}');">
            {{ __('tourAdmin.list.cancel') }}
        </a>

    </form>
</div>
@endsection
