@extends('layouts.passenger')

@section('content')

    <h3>{{ __('passenger.profile.edit') }}</h3>
    <br/>
    <form action="{{ route('passenger.profile.update', $passenger) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">

            @component('components.passenger.edit-field', [
                        'LABEL'   => __('passenger.list.first_name'),
                        'NAME'    => 'first_name',
                        'TYPE'    => 'text',
                        'FIELD'    => $passenger->first_name,
                        ])
            @endcomponent

            @component('components.passenger.edit-field', [
                        'LABEL'   => __('passenger.list.last_name'),
                        'NAME'    => 'last_name',
                        'TYPE'    => 'text',
                        'FIELD'    => $passenger->last_name,
                        ])
            @endcomponent

        </div>
        <br/>
        <div class="form-row">

            @component('components.passenger.edit-field', [
                        'LABEL'   => __('passenger.list.mobile_number'),
                        'NAME'    => 'mobile_number',
                        'TYPE'    => 'text',
                        'FIELD'    => $passenger->mobile_number,
                        ])
            @endcomponent

            @component('components.passenger.edit-field', [
                        'LABEL'   => __('passenger.register_completion.email'),
                        'NAME'    => 'email',
                        'TYPE'    => 'email',
                        'FIELD'    => $passenger->passenger->email,
                        ])
            @endcomponent

        </div>
        <br/>
        <div class="form-row">
            @component('components.passenger.edit-field', [
                        'LABEL'   => __('passenger.register_completion.national_code'),
                        'NAME'    => 'national_code',
                        'TYPE'    => 'text',
                        'FIELD'    => $passenger->passenger->national_code,
                        ])
            @endcomponent

            @component('components.passenger.edit-field', [
                        'LABEL'   => __('passenger.register_completion.birthday'),
                        'NAME'    => 'birthday',
                        'TYPE'    => 'date',
                        'FIELD'    => $passenger->passenger->birthday,
                        ])
            @endcomponent

        </div>
        <br/>
        <div class="form-row">
            @component('components.passenger.edit-field', [
                        'LABEL'   => __('passenger.register_completion.telephone_number'),
                        'NAME'    => 'telephone_number',
                        'TYPE'    => 'text',
                        'FIELD'    => $passenger->passenger->telephone_number,
                        ])
            @endcomponent
        </div>
        <br>
        <button type="submit" class="btn btn-success" onclick="return confirm('{{ __('passenger.alerts.profile.confirm_edit') }}');">
            {{ __('passenger.edit.submit') }}
        </button>

        <a type="button" class="btn btn-primary text-light" onclick="return confirm('{{ __('passenger.alerts.profile.change_password') }}');" data-toggle="modal" data-target="#changePasswordModal">
            {{ __('passenger.edit.password') }}
        </a>

        <a href="{{ route('passenger.profile.index') }}" type="submit" class="btn btn-danger text-light" onclick="return confirm('{{ __('passenger.alerts.profile.cancel_edit') }}');">
            {{ __('passenger.list.cancel') }}
        </a>

    </form>

    <div class="modal fade" id="changePasswordModal" tabindex="-1">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <div class="card-header card-header-primary text-center">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                            <h4 class="card-title">{{ __('passenger.edit.password') }}</h4>
                            <br>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('passenger.resetPassword', $passenger) }}" class="form" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                        </div>
                                        <input name="password" type="password" placeholder="{{ __('passenger.profile.new_password') }}" class="form-control @error('password') is-invalid @enderror">

                                        @error('password')
                                            <span class="container text-danger text-small" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                        </div>
                                        <input name="password_confirmation" type="password" placeholder="{{ __('passenger.profile.confirm_new_password') }}" class="form-control @error('password') is-invalid @enderror">

                                        @error('password')
                                            <span class="container text-danger text-small" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="container text-center ml-2 btn btn-primary btn-link btn-wd btn-lg" onclick="return confirm('{{ __('passenger.alerts.profile.change_password') }}');">
                                {{ __('passenger.edit.password') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        @if($errors->any())

            $('#changePasswordModal').modal('show');

        @endif
    </script>
@endpush
