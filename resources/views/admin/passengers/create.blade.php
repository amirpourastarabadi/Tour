@extends('layouts.admin_panel')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Passenger</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.passengers.store')}}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">First Name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                   value="{{old("first_name")}}">
                                            @error('first_name') <span class="text-danger">{{$message}}</span>@enderror<br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Lase Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                   value="{{old("last_name")}}">
                                            @error('last_name') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">National Code</label>
                                            <input type="text" class="form-control" name="national_code"
                                                   value="{{old("national_code")}}">
                                            @error('national_code') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Birthday</label>
                                            <input type="date" class="form-control" name="birthday"
                                                   value="{{old('birthday')}}">
                                            @error('birthday') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                   value="{{old('email')}}">
                                            @error('email') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Phone Number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                   value="{{old('mobile_number')}}">
                                            @error('mobile_number') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <input type="password" class="form-control" name="password">
                                            @error('password') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password">
                                            @error('confirm_password') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Create</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
@endsection



