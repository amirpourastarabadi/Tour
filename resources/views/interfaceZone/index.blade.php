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


<div class="container-fluid">
    <div class="row">
        <form action="{{route('search.index')}}" method="get" class="form-inline"
              style="margin-top: 20px; height: 170px;width: 100%; background-color: rgba(0,0,0,.7)">
            <div class="form-group bmd-form-group ml-5">
                <div class="input-group">
                    <input name="origin" type="text" value="{{request()->query('origin')}}"
                           class="form-control text-light text-bolder" required>
                </div>
            </div>
            <div class="form-group bmd-form-group ml-5">
                <div class="input-group">
                    <input name="destination" type="text" value="{{request()->query('destination')}}"
                           class="form-control text-light text-bolder" required>
                </div>
            </div>
            <div class="form-group bmd-form-group ml-5">
                <div class="input-group">

                    <input name="start_at" type="date" value="{{request()->query('start_at')}}"
                           class="form-control text-light" required>
                </div>
            </div>
            <div class="form-group bmd-form-group ml-5">
                <div class="input-group">

                    <input name="duration" type="text" value="{{request()->query('duration'). " Days"}}"
                           class="form-control text-light" required>
                </div>
            </div>
            <div class="form-group bmd-form-group ml-5">
                <div class="input-group">

                    <input name="count" type="text" max="10" min="1" required value="{{request()->query('count')." Person"}}"
                           class="form-control text-light">
                </div>
            </div>


            <input type="submit" value="GO" class="btn btn-info btn-warning ml-5">
        </form>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-9">
            @foreach($tours as $tour)
                <div class="row my-3 border" style="background-color: rgba(150,150,150,.1)">
                    {{--                    --------------------IMAGE----------------------}}
                    <div class="col-4">
                        <img src="{{$tour->hotel->image}}" width="100%" height="auto">
                    </div>
                    {{--                    --------------------HOTEL INFORMATION----------------------}}
                    <div class="col-5 mt-4">
                        <h6 style="display: inline">Hotel:</h6> <span
                            style="font-size: 13px">{{$tour->hotel->name}}</span>
                        <span style="display: block">
                        @for($i = 0; $i < $tour->hotel->stars; $i++)
                                <i class="material-icons text-warning">star_rate</i>
                            @endfor
                            </span>
                        <h6 style="display: inline">Address: </h6> <span
                            style="font-size: 13px">{{$tour->hotel->address}}</span>
                    </div>
                    {{--                    --------------------RESERVATION------------------------}}
                    <div class="col-3 text-center pt-4" style="background-color: rgba(0,0,100,.1)">
                        <div>price for each ticket</div>
                        <div class="text-danger">{{$tour->prettyPrice($tour->price)}}</div>
                        <a href="{{route('search.show', $tour)}}" class="btn btn-success btn-sm mt-4">Reserve</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-3 ">
            <div class="row my-3 text-center">
                <div class="col-12">
                    <h6>Filters</h6>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 text-center">
                    <form action="{{route('search.update', ['search' => $tour])}}" class="form" method="post">
                        @csrf
                        <h6 class="text-center">Hotel Stars</h6>
                        @for($i = 5; $i >= 1; $i--)
                            <input type="checkbox" value="{{$i}}">
                            @for($j=1; $j <= $i; $j++)
                                <i class="material-icons text-warning">star_rate</i>
                            @endfor
                            @for($k = 5; $k > $i ; $k--)
                                <i class="material-icons text-dark">star_rate</i>
                            @endfor
                            <br>
                        @endfor
                        <hr>
                        <h6 class="text-center">Price Range</h6>
                        <div class="row my-3">
                            <div class="col">
                                <input type="text" class="form-control border" placeholder="Min Price">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control border" placeholder="Max Price">
                            </div>
                        </div>
                        <hr>
                        <input type="submit" onclick="alert('UNDER CONSTRUCT')" value="Submit"
                               class="btn btn-success text-center mt-4">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
