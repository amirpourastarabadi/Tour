<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Material Kit CSS -->
    <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet"/>
    <script>{{ asset('assets/js/core/bootstrap-material-design.min.js') }}</script>
    <script>{{ asset('assets/js/core/jquery.min.js') }}</script>

    <link
        href="https://demos.creative-tim.com/test/material-dashboard-pro/assets/css/material-dashboard.min.css?v=2.0.3"
        rel="stylesheet">
    <title>Reservation</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary sticky-top">
    <div class="container">
        <div class="collapse navbar-collapse">
            <a class="navbar-brand" href="{{ route('index') }}">{{ __('navbar.main.tour') }}</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item" style="margin-bottom: -20px">
                    @auth
                        <form class="form-inline ml-auto" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('index') }}" class="nav-link d-inline-flex">
                                <i class="material-icons">home</i>
                                <p>{{ __('navbar.main.home') }}</p>
                            </a>

                            <a class="nav-link d-inline-flex"
                               href="{{ route( Auth::user()->role . '.profile.index' ) }}">
                                <i class="material-icons">dashboard</i>
                                <p>{{ __('navbar.main.panel') }}</p>
                            </a>

                            <a class="nav-link d-inline-flex" style="cursor: pointer"
                               onclick="this.parentNode.submit();">
                                <i class="material-icons">exit_to_app</i>
                                <p>{{ __('navbar.main.logout') }}</p>
                            </a>
                        </form>
                    @else
                        <div class="form-inline ml-auto">
                            <a type="button" class="nav-link d-inline-flex" style="cursor: pointer" data-toggle="modal"
                               data-target="#loginModal">
                                <i class="material-icons">login</i>
                                <p>{{ __('navbar.main.login') }}</p>
                            </a>

                            <a type="button" class="nav-link d-inline-flex" style="cursor: pointer" data-toggle="modal"
                               data-target="#registerModal">
                                <i class="material-icons">person_add</i>
                                <p>{{ __('navbar.main.register') }}</p>
                            </a>
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h3>Reservation</h3>
    <hr>
    <div class="row">
        {{-----------------IMAGE-----------------}}
        <div class="col-4">
            <img src="{{$tour->hotel->image}}" width="100%">
        </div>
        {{-----------------TOUR INFORMATION-----------------}}
        <div class="col-8">
            {{-----------------TOUR-----------------}}
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
            {{-----------------HOTEL-----------------}}
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
                            @foreach($tour->roomServices as $roomService)
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            Beds: <span class="text-primary text-bold">{{ $roomService->beds }}</span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            Type: <span
                                                class="text-primary text-bold">{{ $roomService->room_type }}</span>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            Price: <span
                                                class="text-primary text-bold">{{ $roomService->room_service_price}}</span>
                                            <input type="checkbox" style="display: inline">

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <h4>Tour Services</h4>
                        </div>
                        <div class="col-12">
                            @foreach($tour->tourServices as $tourService)
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group">
                                            Service: <span
                                                class="text-primary text-bold">{{ $tourService->service }}</span>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            Price: <span
                                                class="text-primary text-bold">{{ $tourService->tour_service_price }}</span>
                                            <input type="checkbox" style="display: inline">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                        <hr>


                        <div class="col-12">
                            <h4>Transportation Services</h4>
                        </div>
                        <div class="col-12">
                            @foreach($tour->transportationServices as $transportationService)
                                <div class="col-4">
                                    <div class="form-group">
                                        Vehicle: <span
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
                                        Price: <span
                                            class="text-primary text-bold">{{ $transportationService->transition_service_price }}</span>
                                        <input type="checkbox" style="display: inline">
                                    </div>
                                </div>

                            @endforeach
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

</body>
</html>
