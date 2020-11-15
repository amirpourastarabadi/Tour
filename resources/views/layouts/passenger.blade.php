@extends('layouts.navbar')

@section('main_content')
    <div class="wrapper ">
        <div class="sidebar" style="margin-top: 74px" data-color="purple" data-background-color="white">
            <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag
        -->
            <div class="logo">
                <a href="{{ route('passenger.profile.index') }}" class="simple-text logo-normal">
                    {{ __('passenger.layout.sidebar_title') }}
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('passenger.profile.index') }}">
                            <i class="material-icons">account_circle</i>
                            <p>{{ __('passenger.layout.profile') }}</p>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('passenger.profile.edit', auth()->user()) }}">
                            <i class="material-icons">edit</i>
                            <p>{{ __('passenger.profile.edit') }}</p>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('passenger.reservation.index') }}">
                            <i class="material-icons">list</i>
                            <p>{{ __('passenger.tours_list.list') }}</p>
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
            <div class="content" style="margin-top: 0px">
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
