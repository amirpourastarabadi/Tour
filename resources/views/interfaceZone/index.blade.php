@extends('layouts.navbar')

@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('search.index')}}" method="get" class="form-inline"
                  style="margin-top: 20px; height: 170px;width: 100%; background-color: rgba(0,0,0,.7)">
                <div class="form-group bmd-form-group ml-5">
                    <div class="input-group">
                        <input name="origin" type="text" value="{{session('search.query.origin')}}"
                               class="form-control text-light text-bolder" required>
                    </div>
                </div>
                <div class="form-group bmd-form-group ml-5">
                    <div class="input-group">
                        <input name="destination" type="text" value="{{session('search.query.destination')}}"
                               class="form-control text-light text-bolder" required>
                    </div>
                </div>
                <div class="form-group bmd-form-group ml-5">
                    <div class="input-group">

                        <input name="start_at" type="date" value="{{session('search.query.start_at')}}"
                               class="form-control text-light" required>
                    </div>
                </div>
                <div class="form-group bmd-form-group ml-5">
                    <div class="input-group">

                        <input name="duration" type="text" value="{{session('search.query.duration')." days"}}"
                               class="form-control text-light" required>
                    </div>
                </div>
                <div class="form-group bmd-form-group ml-5">
                    <div class="input-group">

                        <input name="count" type="text" max="10" min="1" required
                               value="{{session('search.query.count'). " persons"}}"
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
                        <form action="{{route('search.update', 1)}}" class="form" method="post">
                            @method('PUT')
                            @csrf
                            <h6 class="text-center">Hotel Stars</h6>
                            @for($i = 5; $i >= 1; $i--)
                                <input type="checkbox" name="stars[]" value="{{$i}}">
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
                                    <input type="text" class="form-control border" name="min_price"
                                           placeholder="Min Price">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border" name="max_price"
                                           placeholder="Max Price">
                                </div>
                            </div>
                            <hr>
                            <input type="submit" value="Submit"
                                   class="btn btn-success text-center mt-4">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
