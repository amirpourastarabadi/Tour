@extends('layouts.tourAdmin')

@section('content')

    <form action="{{ route('tourAdmin.reservation.store', $tour) }}" method="POST">
        @csrf
        <fieldset>
            <legend> tour information</legend>
            <div class="form-row mt-3">
                <div class="form-group bmd-form-group col-md-3">
                    <label class="form-label">Origin</label>
                    <input type="text" class="form-control" placeholder="{{$tour->origin}}" disabled>
                </div>
                <div class="form-group bmd-form-group col-md-3">
                    <label class="form-label">Destination</label>
                    <input type="text" class="form-control" placeholder="{{$tour->destination}}" disabled>
                </div>
                <div class="form-group bmd-form-group col-md-3">
                    <label class="form-label">Data</label>
                    <input type="text" class="form-control" placeholder="{{$tour->start_at}}" disabled>
                </div>
                <div class="form-group bmd-form-group col-md-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" placeholder="{{$tour->prettyPrice()}}" disabled>
                </div>
            </div>
        </fieldset>

        <br/>
        <fieldset>
            <legend>Passenger Information</legend>
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label>National Code</label>
                    <input name="national_code" id="national_code" value="{{ old('national_code') }}" type="text"
                           class="form-control">
                    @error('national_code') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Telephone Number</label>
                    <input id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" type="text"
                           class="form-control">
                    @error('mobile_number') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="col-2">
                    <a class="btn btn-success" id="sendCode">Send Code</a>
                </div>
            </div>
            <br/>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input name="first_name" id="first_name" value="{{ old('first_name') }}" type="text"
                           class="form-control">
                    @error('first_name') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input name="last_name" id="last_name" value="{{ old('last_name') }}" type="text"
                           class="form-control">
                    @error('last_name') <span class="text-danger">{{$message}}</span>@enderror
                </div>
            </div>
            <br/>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Birth Day</label>
                    <input name="birthday" id="birthday" value="{{ old('birthday') }}" type="date" class="form-control">
                    @error('birthday') <span class="text-danger">{{$message}}</span>@enderror
                </div>
            </div>
            <br/>
            <div class="from-row">
                <div class="form-group col-md-6">
                    <label>Phone Verification Code</label>
                    <input name="password" type="text" class="form-control" id="password">
                    @error('password') <span class="text-danger">{{$message}}</span>@enderror
                    @error('invalid') <span class="text-danger">{{$message}}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="submit"
                    onclick="return confirm('Do you confirm these information?');" disabled>
                Submit
            </button>
            <a href="{{ route('superAdmin.admin.index') }}" type="submit" class="btn btn-danger text-light"
               onclick="return confirm('Are you sure to cancel reservation?');">
                Cancel
            </a>
        </fieldset>
    </form>
@endsection

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#sendCode").click(function () {
                $.ajax({
                    url: "{{route('tourAdmin.reservation.phoneVerification')}}",
                    data: {'phone_number': $("#mobile_number").val()},
                    success: function (data) {
                        if (data) {
                            $("#mobile_number").attr('disabled', true)
                            $("#first_name").val(data[0].first_name)
                            $("#first_name").attr('disabled', true)
                            $("#last_name").val(data[0].last_name)
                            $("#last_name").attr('disabled', true)
                            $("#birthday").val(data[1].birthday)
                            $("#birthday").attr('disabled', true)
                            $("#national_code").val(data[1].national_code)
                            $("#national_code").attr('disabled', true)
                        } else {
                            $("#mobile_number").attr('disabled', true)

                        }

                    },
                });
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $("#password").keyup(function () {
                $.ajax({
                    url: "{{route('tourAdmin.reservation.check')}}",
                    data: {'phone_number': $("#mobile_number").val(), 'password': $("#password").val()},
                    success: function (data) {
                        if (data) {
                            $("#submit").attr('disabled', false);
                        }
                    },
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#submit").click(function () {
                $("#mobile_number").attr('disabled', false)
                $("#first_name").attr('disabled', false)
                $("#last_name").attr('disabled', false)
                $("#birthday").attr('disabled', false)
                $("#national_code").attr('disabled', false)
            });
        });
    </script>
@endpush
