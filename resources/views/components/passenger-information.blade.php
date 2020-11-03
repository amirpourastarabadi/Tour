<form action="{{ route('tourAdmin.reservation.store', 1) }}" method="post">
    @csrf
    <h3>Personal Information</h3>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>First Name</label>
            <input name="first_name" id="first_name"
                   value="@include('includs.get-passenger-valu-form-session', ['ATTRIBUTE' => 'first_name'])"
                   type="text"
                   class="form-control">
            @error('first_name') <span class="text-danger">{{$message}}</span>@enderror
        </div>
        <div class="form-group col-md-6">
            <label>Last Name</label>
            <input name="last_name" id="last_name"
                   value="@include('includs.get-passenger-valu-form-session', ['ATTRIBUTE' => 'last_name'])"
                   type="text"
                   class="form-control">
            @error('last_name') <span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>
    <br/>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>National Code</label>
            <input name="national_code" id="national_code"
                   value=@if(session('reservation.user')) "{{session('reservation.user.passenger.national_code')}}" @else
                "{{old('national_code')}}" @endif
            type="text"
            class="form-control">
            @error('national_code') <span class="text-danger">{{$message}}</span>@enderror
        </div>
        <div class="form-group col-md-6">
            <label>Birth Day</label>
            <input name="birthday" id="birthday"
                   value=@if(session('reservation.user')) "{{session('reservation.user.passenger.birthday')}}" @else
                "{{old('birthday')}}" @endif
            type="date" class="form-control">
            @error('birthday') <span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success" id="submit"
            onclick="return confirm('Do you confirm these information?');">
        Next
    </button>
    <a href="{{ route('tourAdmin.reservation.index') }}" type="submit" class="btn btn-danger text-light"
       onclick="return confirm('Are you sure to cancel reservation?');">
        Cancel
    </a>
</form>
