@extends('layouts.admin_panel')

@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{route('admin.passengers.create')}}"><h3>create new passenger</h3></a>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Passenger list</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th scope="col">first name</th>
                                    <th scope="col">last name</th>
                                    <th scope="col">national code</th>
                                    <th scope="col">birthday</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone number</th>
                                    <th scope="col">operations</th>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{$item->first_name}}</td>
                                                <td>{{$item->last_name}}</td>
                                                <td>{{$item->national_code}}</td>
                                                <td>{{$item->birthday}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->mobile_number}}</td>
                                                <td>
                                                    <a href="{{ route('admin.passengers.edit', $item) }}">edit</a>
                                                    <form action="{{route('admin.passengers.destroy', $item)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="delete">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $items->links('pagination::bootstrap-4') }}

                            </div>
                        </div>
                    </div>
                </div>

@endsection


{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}

{{--<a href="{{route('admin.passengers.create')}}"><h3>create new passenger</h3></a>--}}

{{--<table class="table">--}}
{{--    <thead class="thead-dark">--}}
{{--    <tr>--}}
{{--        <th scope="col">first name</th>--}}
{{--        <th scope="col">last name</th>--}}
{{--        <th scope="col">national code</th>--}}
{{--        <th scope="col">birthday</th>--}}
{{--        <th scope="col">email</th>--}}
{{--        <th scope="col">phone number</th>--}}
{{--        <th scope="col">operations</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach($items as $item)--}}
{{--        <tr>--}}
{{--            <td>{{$item->first_name}}</td>--}}
{{--            <td>{{$item->last_name}}</td>--}}
{{--            <td>{{$item->national_code}}</td>--}}
{{--            <td>{{$item->birthday}}</td>--}}
{{--            <td>{{$item->email}}</td>--}}
{{--            <td>{{$item->mobile_number}}</td>--}}
{{--            <td>--}}
{{--                <a href="{{ route('admin.passengers.edit', $item) }}">edit</a>--}}
{{--                <form action="{{route('admin.passengers.destroy', $item)}}" method="post">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <input type="submit" value="delete">--}}
{{--                </form>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}
{{--{{ $items->links() }}--}}
{{--</body>--}}
{{--</html>--}}
