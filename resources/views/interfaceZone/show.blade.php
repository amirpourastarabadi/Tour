@extends('layouts.navbar')

@section('main_content')
    @auth()
        <div class="container mt-5">
            <h3>Reservation</h3>
            <hr>
            <div class="row">
                {{--                ---------------IMAGE-----------------}}
                <div class="col-4">
                    <img src="{{$tour->hotel->image}}" width="100%">
                </div>
                {{--                ---------------TOUR INFORMATION-----------------}}
                <div class="col-8">
                    {{--                    ---------------TOUR-----------------}}
                    <div class="row">
                        <div class="col-12">
                            <h2>Tour Information</h2>
                        </div>
                        <hr>
                        <div class="col-4">
                            <h4 style="display: inline">From</h4> : {{$tour->origin}}
                        </div>
                        <div class="col-4">
                            <h4 style="display: inline">To</h4> : {{$tour->destination}}
                        </div>
                        <div class="col-4">
                            <h4 style="display: inline">On</h4> : {{$tour->start_at}}
                        </div>
                    </div>
                    <hr>
                    {{--                    ---------------HOTEL-----------------}}
                    <div class="row mt-5">
                        <div class="col-12">
                            <h2> Hotel Information</h2>
                        </div>
                        <hr>
                        <div class="col-6">
                            <h4 style="display: inline">Hotel</h4> : {{$tour->hotel->name}}
                        </div>
                        <div class="col-6">
                            <h4 style="display: inline">Stars</h4> : @for($i = 0; $i < $tour->hotel->stars; $i++)
                                <i class="material-icons text-warning">star_rate</i>
                            @endfor
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-5">
                        <div class="col-12">
                            <h2>Optional Services</h2>
                        </div>
                        <div class="col-12">
                            <form action="{{route('search.store', $tour)}}" method="post">
                                @csrf
                                <div class="col-12">
                                    <h4>Room Services</h4>
                                </div>
                                <div class="col-12">
                                    @foreach($tour->roomServices as $key => $roomService)
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    #{{$key+1}}- Beds: <span
                                                        class="text-primary text-bold">{{ $roomService->beds }}</span>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    Type: <span
                                                        class="text-primary text-bold">{{ $roomService->room_type }}</span>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    Service: <span
                                                        class="text-primary text-bold">{{ $roomService->room_service }}</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input type="radio" style="display: inline" name="room_service"
                                                           value="{{$roomService->id}}">
                                                    Price: <span
                                                        class="text-primary text-bold">{{ $roomService->room_service_price}}</span>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="col-12">
                                    <h4>Tour Services</h4>
                                </div>
                                <div class="col-12">
                                    @foreach($tour->tourServices as $key => $tourService)
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group">
                                                    #{{$key+1}}- Service: <span
                                                        class="text-primary text-bold">{{ $tourService->service }}</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input type="checkbox" style="display: inline" name="tour_service[]"
                                                           value="{{$tourService->id}}">
                                                    Price: <span
                                                        class="text-primary text-bold">{{ $tourService->tour_service_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <hr>


                                <div class="col-12">
                                    <h4>Transportation Services</h4>
                                </div>
                                <div class="col-12">
                                    @foreach($tour->transportationServices as $key => $transportationService)
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    #{{$key+1}}- Vehicle: <span
                                                        class="text-primary text-bold">{{ $transportationService->vehicle }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    Transition Type: <span
                                                        class="text-primary text-bold">{{ $transportationService->transition_type }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    Company: <span
                                                        class="text-primary text-bold">{{ $transportationService->company }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    Origin Address: <span
                                                        class="text-primary text-bold">{{ $transportationService->origin_address }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    Destination Address: <span
                                                        class="text-primary text-bold">{{ $transportationService->destination_address }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    Departure Time: <span
                                                        class="text-primary text-bold">{{ $transportationService->departure_time }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    Arrival Time: <span
                                                        class="text-primary text-bold">{{ $transportationService->arrival_time }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    Conditions: <span
                                                        class="text-primary text-bold">{{ $transportationService->conditions }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    Percentage Reduction: <span
                                                        class="text-primary text-bold">{{ $transportationService->percentage_reduction }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="radio" style="display: inline"
                                                           name="transportation_service"
                                                           value="{{$transportationService->id}}">
                                                    Price: <span
                                                        class="text-primary text-bold">{{ $transportationService->transition_service_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                    @endforeach
                                </div>
                                <hr>
                                <div class="col-12">
                                    <h4>Tickets number</h4>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            How many tickets do you need?
                                            <div class="form-group">
                                                <input type="number" max="{{$tour->total_num - $tour->filled_num}}"
                                                       style="display: inline"
                                                       name="count" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <input type="submit" class="btn btn-success my-4 text-center" value="Reserve">
                                    <a href="{{url('/')}}" class="btn btn-danger"
                                       onclick="return confirm('Cancel Reservation?')">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @guest()
        @if(@session('verification'))
            <div class="card-header text-center mb-5 mt-3">
                <h4>Enter Verification Code</h4>
            </div>
            <div class="my-2 alert w-50 alert-info text-center" style="margin-left: 25%">this code will send to your
                mobile in production
            </div>
            <div class="card-body">
                <form class="form" action="{{route('search.verification')}}" method="post">
                    @csrf
                    <div class="form-group w-50 mb-5" style="margin-left: 25%">
                        <label for="">Verification Code</label>
                        <input type="text" name="verification_code" class="form-control my-2"
                               value="{{session('verification')}}">
                    </div>

                    <input type="submit" class="btn btn-success w-50" value="Next"
                           style="margin-left: 25%">
                </form>
            </div>
        @else
            <div class="card w-50" style="margin-left: 25%">
                <div class="card-header text-center mb-5 mt-3"><h4>Enter your phone number</h4></div>
                <form class="form" action="{{route('search.verification')}}" method="post">
                    @csrf
                    <div class="form-group w-50 mb-5" style="margin-left: 25%">
                        <label for="">Mobile Number</label>
                        <input type="text" name="mobile_number" class="form-control my-2" minlength="5" maxlength="15">
                    </div>

                    <input type="submit" class="btn btn-success w-50" value="verification code"
                           style="margin-left: 25%">

                </form>
            </div>
        @endif
    @endguest

@endsection



