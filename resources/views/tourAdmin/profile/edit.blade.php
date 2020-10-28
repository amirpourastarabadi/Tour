@extends('layouts.tourAdmin')

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

    <h3>Edit Profile</h3>
    <br/>
    <form action="{{ route('tourAdmin.profile.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group bmd-form-group col-md-6">
                <label>Manager First Name</label>
                <input name="first_name" value="{{ $user->first_name }}" type="text" class="form-control">
            </div>

            <div class="form-group bmd-form-group col-md-6">
                <label>Manager Last Name</label>
                <input name="last_name" value="{{ $user->last_name }}" type="text" class="form-control">
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Agency</label>
                <input name="agency" value="{{ $user->tourAdmin->agency }}" type="text" class="form-control">
            </div>
            <br>
            <div class="form-group col-md-6">
                <label>Guild Code</label>
                <input  name="guild_code" value="{{ $user->tourAdmin->guild_code }}" type="text" class="form-control">
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Opening Date</label>
                <input name="start_at" value="{{ $user->tourAdmin->start_at }}" type="date" class="form-control">
            </div>
            <br>
            <div class="form-group col-md-6">
                <label>E-Mail Address</label>
                <input  name="email" value="{{ $user->tourAdmin->email }}" type="text" class="form-control">
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Telephone Number</label>
                <input  name="telephone_number" value="{{ $user->tourAdmin->telephone_number }}" type="text" class="form-control">
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
           onclick="return confirm('edit');">
            Cancel
        </a>

        <form action="{{route('tourAdmin.profile.destroy', $user)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('This account will not be accessible after clicking ok')">DELETE ACCOUNT</button>
        </form>

    </form>
@endsection
