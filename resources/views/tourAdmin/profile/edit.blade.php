@extends('layouts.tourAdmin')

@section('content')

    <h3>Edit Profile</h3>
    <br/>
    <form action="{{ route('tourAdmin.profile.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>Manager First Name</label>
                <input name="first_name" value="{{ $user->first_name }}" type="text" class="form-control">
                @error('first_name') <span class="text-danger text-small">{{$message}}</span>@enderror
            </div>

            <div class="form-group bmd-form-group col-md-6">
                <label>Manager Last Name</label>
                <input name="last_name" value="{{ $user->last_name }}" type="text" class="form-control">
                @error('last_name') <span class="text-danger text-small">{{$message}}</span>@enderror
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Agency</label>
                <input name="agency" value="{{ $user->tourAdmin->agency }}" type="text" class="form-control">
                @error('agency') <span class="text-danger text-small">{{$message}}</span>@enderror
            </div>
            <br>
            <div class="form-group col-md-6">
                <label>Guild Code</label>
                <input name="guild_code" value="{{ $user->tourAdmin->guild_code }}" type="text" class="form-control">
                @error('guild_code') <span class="text-danger text-small">{{$message}}</span>@enderror
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Opening Date</label>
                <input name="start_at" value="{{ $user->tourAdmin->start_at }}" type="date" class="form-control">
                @error('start_at') <span class="text-danger text-small">{{$message}}</span>@enderror
            </div>
            <br>
            <div class="form-group col-md-6">
                <label>E-Mail Address</label>
                <input name="email" value="{{ $user->tourAdmin->email }}" type="text" class="form-control">
                @error('email') <span class="text-danger text-small">{{$message}}</span>@enderror
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Telephone Number</label>
                <input name="telephone_number" value="{{ $user->tourAdmin->telephone_number }}" type="text"
                       class="form-control">
                @error('telephone_number') <span class="text-danger text-small">{{$message}}</span>@enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success"
                onclick="return confirm('Do you confirm these form?');">
            Submit
        </button>

        <a href="{{ route('tourAdmin.resetPassword') }}" class="btn btn-primary text-light"
           onclick="return confirm('Are you sure to reset password?');">
            Reset Password
        </a>

        <a href="{{ route('tourAdmin.profile.index') }}" type="submit" class="btn btn-danger text-light"
           onclick="return confirm('Ignore changes?');">
            Cancel
        </a>


    </form>
@endsection
