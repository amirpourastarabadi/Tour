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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
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
            <a class="navbar-brand" href="{{ route('welcome') }}">{{ __('navbar.tour') }}</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item" style="margin-bottom: -20px">
                    @auth
                        <form class="form-inline ml-auto" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('welcome') }}" class="nav-link d-inline-flex">
                                <i class="material-icons">home</i>
                                <p>{{ __('navbar.home') }}</p>
                            </a>

                            <a class="nav-link d-inline-flex" href="{{ route( Auth::user()->role . '.profile.index' ) }}">
                                <i class="material-icons">dashboard</i>
                                <p>{{ __('navbar.panel') }}</p>
                            </a>

                            <a class="nav-link d-inline-flex" style="cursor: pointer" onclick="this.parentNode.submit();">
                                <i class="material-icons">exit_to_app</i>
                                <p>{{ __('navbar.logout') }}</p>
                            </a>
                        </form>
                    @else
                        <div class="form-inline ml-auto">
                            <a  type="button" class="nav-link d-inline-flex" style="cursor: pointer" data-toggle="modal" data-target="#loginModal">
                                <i class="material-icons">login</i>
                                <p>{{ __('navbar.login') }}</p>
                            </a>

                            <a type="button" class="nav-link d-inline-flex" style="cursor: pointer" data-toggle="modal" data-target="#registerModal">
                                <i class="material-icons">person_add</i>
                                <p>{{ __('navbar.register') }}</p>
                            </a>
                        </div>
                    @endif
                </li>
            </ul>
            <form class="form-inline ml-auto">
                <div class="form-group has-white">
                    <input type="text" class="form-control" placeholder="Search">
                </div>

                {{--#TODO create search process--}}
                <button type="submit" class="btn btn-neutral btn-icon btn-round">
                    <i class="material-icons">search</i>
                </button>
            </form>
        </div>
    </div>
</nav>

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
                        <h4 class="card-title">{{ __('navbar.login') }}</h4>
                        <br>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" class="form" method="POST">
                        @csrf
                        <p class="description text-center">{{ __('navbar.description') }}</p>
                        <div class="card-body">
                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">call</i></div>
                                    </div>
                                    <input name="mobile_number" type="text" class="form-control" placeholder="{{ __('navbar.mobile') }}">

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
                                    <input name="password" type="password" placeholder="{{ __('navbar.password') }}" class="form-control">

                                    @error('password')
                                        <span class="container text-danger text-small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="container text-center ml-2 btn btn-primary btn-link btn-wd btn-lg">
                            {{ __('navbar.login') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('main_content')
<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/material-dashboard.min.js?v=2.1.2')}}" type="text/javascript"></script>

<script type="text/javascript">
    @if ($errors->any())
        $('#loginModal').modal('show');
    @endif
</script>

@stack('js')
</body>

</html>

