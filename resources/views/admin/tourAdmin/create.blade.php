@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Tour Admin</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.tourAdmins.store')}}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" ">First Name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                   value="{{old("first_name")}}">
                                            @error('first_name') <span class="text-danger">{{$message}}</span>@enderror
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" ">Lase Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                   value="{{old("last_name")}}">
                                            @error('last_name') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" ">Guild Code</label>
                                            <input type="text" class="form-control" name="guild_code"
                                                   value="{{old("guild_code")}}">
                                            @error('guild_code') <span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class=" ">Agency</label>
                                            <input type="text" class="form-control" name="agency"
                                                   value="{{old('agency')}}">
                                            @error('agency') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                   value="{{old('email')}}">
                                            @error('email') <span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="">Phone Number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                   value="{{old('mobile_number')}}">
                                            @error('mobile_number') <span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="">Telephone Number</label>
                                            <input type="text" class="form-control" name="telephone_number"
                                                   value="{{old('telephone_number')}}">
                                            @error('telephone_number') <span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="">Opening At</label>
                                            <input type="date" class="form-control" name="start_at"
                                                   value="{{old('start_at')}}">
                                            @error('start_at') <span class="text-danger">{{$message}}</span>@enderror
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



