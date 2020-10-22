<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
</head>

<body>
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="{{ route('profile.index') }}" class="simple-text logo-normal">
                {{ __('superAdmin.layout.sidebar_title') }}
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('superAdmin.index') }}">
                        <i class="material-icons">list</i>
                        <p>{{ __('superAdmin.layout.admins_list') }}</p>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('superAdmin.create') }}">
                        <i class="material-icons">person_add</i>
                        <p>{{ __('superAdmin.layout.add') }}</p>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('superAdmin.edit.profile', auth()->user()) }}">
                        <i class="material-icons">edit</i>
                        <p>{{ __('superAdmin.layout.edit') }}</p>
                    </a>
                </li>

                <li class="nav-item active">

                    {{--#TODO fix this button--}}
                    <form action="{{ route('logout') }}">
                        @csrf
                        @method('post')
                    <a class="nav-link" href="">
                        <i class="material-icons">exit_to_app</i>
                        <p>{{ __('superAdmin.layout.logout') }}</p>
                    </a>
                    </form>
                </li>
                <!-- your sidebar here -->
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="{{ route('superAdmin.index') }}">{{ __('superAdmin.layout.nav_title') }}</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">

                        <!-- your navbar here -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <!-- your content here -->
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            {{--#TODO change href to homepage--}}
                            <a href="#">
                                Tour
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- your footer here -->
            </div>
        </footer>
    </div>
</div>
@stack('js')
</body>

</html>
