@extends('layouts.tourAdmin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h3 class="card-title">{{ $user->tourAdmin->agency }} {{__('tourAdmin.profile.agency')}}</h3>
                    </div>
                </div>
                <div class="card-body">
1
                    Manager: <span class="text-success"
                                   style="font-size: large"><b>{{ $user->first_name }}, {{$user->last_name}}</b></span>
                    <br/><br/>
                    Opening: <span class="text-success"
                                   style="font-size: large"><b>{{ $user->tourAdmin->start_at }}</b></span>
                    <br/><br/>
                    Phone Number: <span class="text-success"
                                        style="font-size: large"><b>{{ $user->tourAdmin->telephone_number }}</b></span>
                    <br/><br/>
                    E-Mail Address: <span class="text-success"
                                          style="font-size: large"><b>{{ $user->tourAdmin->email }}</b></span>
                    <br/><br/>
                    Guild Code: <span class="text-success"
                                      style="font-size: large"><b>{{ $user->tourAdmin->guild_code }}</b></span>
                    <br/><br/>

                </div>
            </div>

            <a href="{{ route('tourAdmin.profile.edit', $user) }}" class="btn btn-success">
                Edit Profile
            </a>


        </div>
    </div>
    {{--#TODO create modals--}}
@endsection
