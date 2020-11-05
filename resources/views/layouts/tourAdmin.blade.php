@extends('layouts.navbar')

@section('main_content')
    <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="{{ route('tourAdmin.tourAdmin.index') }}" class="simple-text logo-normal">
                Agency Panel
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('tourAdmin.profile.index') }}">
                        <i class="material-icons">account_circle</i>
                        <p>{{ __('Admin.layout.profile') }}</p>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('tourAdmin.reservation.index') }}">
                        <i class="material-icons">account_circle</i>
                        <p>Reservation</p>
                    </a>
                </li>

                <li class="nav-item active">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="nav-link" style="cursor: pointer" onclick="this.parentNode.submit();">
                            <i class="material-icons">exit_to_app</i>
                            <p>{{ __('Admin.layout.logout') }}</p>
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
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                @if($result = session('result'))
                    <div class="alert alert-{{$result['alert']}} alert-dismissible fade show">
                        {!! $result['message'] !!}
                        <button type="button" class="close" style="margin-top: 12px" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

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
@endsection
