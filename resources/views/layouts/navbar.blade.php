<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Material Kit CSS -->
    <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
    <script>{{ asset('assets/js/core/bootstrap-material-design.min.js') }}</script>
    <script>{{ asset('assets/js/core/jquery.min.js') }}</script>

    <link href="https://demos.creative-tim.com/test/material-dashboard-pro/assets/css/material-dashboard.min.css?v=2.0.3" rel="stylesheet">

    @stack('css')
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

                            <a class="nav-link d-inline-flex" href="{{ route( Auth::user()->role . '.profile.index' ) }}">
                                <i class="material-icons">dashboard</i>
                                <p>{{ __('navbar.main.panel') }}</p>
                            </a>

                            <a class="nav-link d-inline-flex" style="cursor: pointer" onclick="this.parentNode.submit();">
                                <i class="material-icons">exit_to_app</i>
                                <p>{{ __('navbar.main.logout') }}</p>
                            </a>
                        </form>
                    @else
                        <div class="form-inline ml-auto">
                            <a type="button" class="nav-link d-inline-flex" style="cursor: pointer" data-toggle="modal" data-target="#loginModal">
                                <i class="material-icons">login</i>
                                <p>{{ __('navbar.main.login') }}</p>
                            </a>

                            <a type="button" class="nav-link d-inline-flex" style="cursor: pointer" data-toggle="modal" data-target="#registerModal">
                                <i class="material-icons">person_add</i>
                                <p>{{ __('navbar.main.register') }}</p>
                            </a>
                        </div>
                    @endif
                </li>
            </ul>
            <form class="form-inline ml-auto">
                <div class="form-group has-white">
                    <input type="text" class="form-control" placeholder="{{ __('navbar.main.search') }}">
                </div>

                {{--#TODO create search process--}}
                <button type="submit" class="btn btn-neutral btn-icon btn-round">
                    <i class="material-icons">search</i>
                </button>
            </form>
        </div>
    </div>
</nav>
@auth
    @yield('main_content')
@else
<!--Login modal-->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                    <div class="card-header card-header-primary text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                        <h4 class="card-title">{{ __('navbar.main.login') }}</h4>
                        <br>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" class="form" method="POST">
                        @csrf
                        <p class="description text-center">{{ __('navbar.login.description') }}</p>
                        <div class="card-body">
                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">call</i></div>
                                    </div>
                                    <input name="mobile_number" type="text" placeholder="{{ __('navbar.login.mobile') }}" value="{{ old('mobile_number') }}" class="form-control @error('mobile_number') is-invalid @enderror">

                                    @error('mobile_number')
                                        <span class="container text-danger text-small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                    </div>
                                    <input name="password" type="password" placeholder="{{ __('navbar.login.password') }}" class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                        <span class="container text-danger text-small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="container text-center ml-2 btn btn-primary btn-link btn-wd btn-lg">
                            {{ __('navbar.main.login') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Register modal-->
<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog modal-login" style="width: 50%">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                    <div class="card-header card-header-primary text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                        <h4 class="card-title">{{ __('navbar.main.register') }}</h4>
                        <br>
                        <ul class="container justify-content-around nav nav-tabs md-tabs tabs-2">
                            <li class="nav-item">
                                <a class="nav-link active d-inline-flex" id="passenger" data-toggle="tab" href="#passengerTab">
                                    <i class="material-icons">card_travel</i>
                                    <p>{{ __('navbar.main.passenger') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-inline-flex" id="tourAdmin" data-toggle="tab" href="#tourAdminTab">
                                    <i class="material-icons">support_agent</i>
                                    <p>{{ __('navbar.main.tour_admin') }}</p>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- Tab panels -->
                <div class="tab-content ml-2" style="width: 90%">
                    <!-- passenger register -->
                    <div class="tab-pane fade in show active" id="passengerTab">

                    <form action="{{ route('register.passenger') }}" class="form" method="POST">
                        @csrf
                        <p class="description text-center">{{ __('navbar.register.passenger_register') }}</p>

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">face</i></div>
                                </div>
                                <input name="first_name" type="text" placeholder="{{ __('navbar.register.first_name') }}" value="{{ old('first_name') }}" class="form-control @if($errors->passengerRegister->first('first_name')) is-invalid @endif">

                                @if($errors->passengerRegister->first('first_name'))
                                    <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->passengerRegister->first('first_name') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">face</i></div>
                                </div>
                                <input name="last_name" type="text" placeholder="{{ __('navbar.register.last_name') }}" value="{{ old('last_name') }}" class="form-control @if($errors->passengerRegister->first('last_name')) is-invalid @endif">

                                @if($errors->passengerRegister->first('last_name'))
                                    <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->passengerRegister->first('last_name') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">call</i></div>
                                    </div>
                                    <input name="mobile_number" type="text" placeholder="{{ __('navbar.login.mobile') }}" value="{{ old('mobile_number') }}" class="form-control @if($errors->passengerRegister->first('mobile_number')) is-invalid @endif">

                                    @if($errors->passengerRegister->first('mobile_number'))
                                        <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->passengerRegister->first('mobile_number') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                    </div>
                                    <input name="password" type="password" placeholder="{{ __('navbar.login.password') }}" class="form-control @if($errors->passengerRegister->first('password')) is-invalid @endif">

                                    @if($errors->passengerRegister->first('password'))
                                        <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->passengerRegister->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                    </div>
                                    <input name="password_confirmation" type="password" placeholder="{{ __('navbar.login.password_confirmation') }}" class="form-control @if($errors->passengerRegister->first('password')) is-invalid @endif">

                                    @if($errors->passengerRegister->first('password'))
                                        <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->passengerRegister->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="container text-center ml-2 btn btn-primary btn-link btn-wd btn-lg">
                            {{ __('navbar.main.register') }}
                        </button>
                    </form>
                    </div>
                    <!-- tourAdmin register -->
                    <div class="tab-pane fade" id="tourAdminTab">
                    <form action="{{ route('register.tourAdmin') }}" class="form" method="POST">
                        @csrf
                        <p class="description text-center">{{ __('navbar.register.tour_admin_register') }}</p>
                        <div class="card-body">
                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">face</i></div>
                                    </div>
                                    <input name="first_name" id="ro" type="text" placeholder="{{ __('navbar.register.first_name') }}" value="{{ old('first_name') }}" class="form-control @if($errors->tourAdminRegister->first('first_name')) is-invalid @endif">

                                    @if($errors->tourAdminRegister->first('first_name'))
                                        <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourAdminRegister->first('first_name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">face</i></div>
                                    </div>
                                    <input name="last_name" type="text" placeholder="{{ __('navbar.register.last_name') }}" value="{{ old('last_name') }}" class="form-control @if($errors->tourAdminRegister->first('last_name')) is-invalid @endif">

                                    @if($errors->tourAdminRegister->first('last_name'))
                                        <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourAdminRegister->first('last_name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">call</i></div>
                                        </div>
                                        <input name="mobile_number" type="text" placeholder="{{ __('navbar.login.mobile') }}" value="{{ old('mobile_number') }}" class="form-control @if($errors->tourAdminRegister->first('mobile_number')) is-invalid @endif">

                                        @if($errors->tourAdminRegister->first('mobile_number'))
                                            <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourAdminRegister->first('mobile_number') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                        </div>
                                        <input name="password" type="password" placeholder="{{ __('navbar.login.password') }}" class="form-control @if($errors->tourAdminRegister->first('password')) is-invalid @endif">

                                        @if($errors->tourAdminRegister->first('password'))
                                            <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourAdminRegister->first('password') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                        </div>
                                        <input name="password_confirmation" type="password" placeholder="{{ __('navbar.login.password_confirmation') }}" class="form-control @if($errors->tourAdminRegister->first('password')) is-invalid @endif">

                                        @if($errors->tourAdminRegister->first('password'))
                                            <span class="container text-danger text-small" role="alert">
                                                <strong>{{ $errors->tourAdminRegister->first('password') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="container text-center ml-2 btn btn-primary btn-link btn-wd btn-lg">
                            {{ __('navbar.main.register') }}
                        </button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('main_content')
@endif
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/plugins/bootstrap-selectpicker.js')}}"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src=" {{asset('assets/js/material-dashboard.min.js?v=2.1.2') }}" type="text/javascript"></script>

<script type="text/javascript">
    @if($errors->any())

        $('#loginModal').modal('show');

    @elseif($errors->passengerRegister->any())

        $('#registerModal').modal('show');

    @elseif ($errors->tourAdminRegister->any())

        $('#registerModal').modal('show');
        $('#tourAdmin').click();

    @endif
</script>

@stack('js')
</body>

</html>

