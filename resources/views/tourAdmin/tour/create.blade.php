@extends('layouts.tourAdmin')

@section('content')
    <div class="card col-10">
        <div class="card-header card-header-primary">
            <h4 class="card-title">{{ __('tourAdmin.tourCreation.tour.create') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tourAdmin.tour.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label col-2">{{ __('tourAdmin.tourCreation.tour.hotel') }}</label>
                            @if(isset($hotels))
                                <select name="hotel_id" class="form-control selectpicker col-9 @if($errors->tourCreation->first('hotel')) is-invalid @endif" data-style="btn btn-link">
                                    <option value=""></option>
                                    @foreach($hotels as $hotel)
                                        <option value="{{ $hotel->id }}">
                                            {{ $hotel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                            <br/>
                            <a href="" class="float-right mr-5">
                                {{ __('tourAdmin.tourCreation.tour.create_hotel') }}
                            </a>
                            @if($errors->tourCreation->first('hotel'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('hotel') }}</strong>
                                </span>
                            @endif
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.tour.origin') }}</label>
                            <input name="origin" type="text" class="form-control @if($errors->tourCreation->first('origin')) is-invalid @endif">
                            @if($errors->tourCreation->first('origin'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('origin') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.tour.destination') }}</label>
                            <input name="destination" type="text" class="form-control @if($errors->tourCreation->first('destination')) is-invalid @endif">
                            @if($errors->tourCreation->first('destination'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('destination') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label mt-3 col-3">{{ __('tourAdmin.tourCreation.tour.start_at') }}</label>
                            <input name="start_at" type="date" class="form-control float-right col-7 @if($errors->tourCreation->first('start_at')) is-invalid @endif">
                            @if($errors->tourCreation->first('start_at'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('start_at') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.tour.duration') }}</label>
                            <input name="duration" type="number" class="form-control @if($errors->tourCreation->first('duration')) is-invalid @endif">
                            @if($errors->tourCreation->first('duration'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('duration') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.tour.price') }}</label>
                            <input name="price" type="text" class="form-control @if($errors->tourCreation->first('price')) is-invalid @endif">
                            @if($errors->tourCreation->first('price'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.tour.tour_num') }}</label>
                            <input name="total_num" type="number" class="form-control @if($errors->tourCreation->first('total_num')) is-invalid @endif">
                            @if($errors->tourCreation->first('total_num'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('total_num') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="form-group col-6">
                            <label class="bmd-label col-6">{{ __('tourAdmin.tourCreation.tour.personal_certificates') }}</label>
                            <select class="form-control selectpicker col-5 @if($errors->tourCreation->first('personal_certificates')) is-invalid @endif" data-style="btn btn-link" name="personal_certificates">
                                <option value="1">
                                    {{ __('tourAdmin.tourCreation.tour.yes') }}
                                </option>
                                <option value="0">
                                    {{ __('tourAdmin.tourCreation.tour.no') }}
                                </option>
                            </select>
                            @if($errors->tourCreation->first('personal_certificates'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('personal_certificates') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-6">
                            <label class="bmd-label col-6">{{ __('tourAdmin.tourCreation.tour.marriage_certificates') }}</label>
                            <select class="form-control selectpicker col-5 @if($errors->tourCreation->first('marriage_certificates')) is-invalid @endif" data-style="btn btn-link" name="marriage_certificates">
                                <option value="1">
                                    {{ __('tourAdmin.tourCreation.tour.yes') }}
                                </option>
                                <option value="0">
                                    {{ __('tourAdmin.tourCreation.tour.no') }}
                                </option>
                            </select>
                            @if($errors->tourCreation->first('marriage_certificates'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('marriage_certificates') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <br>

                <hr style="background-color: #9c27b0; height: 2px">
                <h4>
                    {{ __('tourAdmin.tourCreation.tourService.tour_service') }}
                </h4>
                <div class="tour_service">
                    <div class="row container">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.tourService.service') }}</label>
                                <input name="service[]" type="text" class="form-control @if($errors->tourCreation->first('service')) is-invalid @endif">
                                @if($errors->tourCreation->first('service'))
                                    <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourCreation->first('service') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.tourService.tour_service_price') }}</label>
                                <input name="tour_service_price[]" type="text" class="form-control @if($errors->tourCreation->first('tour_service_price')) is-invalid @endif">
                                @if($errors->tourCreation->first('tour_service_price'))
                                    <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourCreation->first('tour_service_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div onclick="addService()" class="float-right mr-5 text-primary" style="cursor: pointer;">
                    {{ __('tourAdmin.tourCreation.tourService.create_service') }}
                </div>

                <br>

                <hr style="background-color: #9c27b0; height: 2px">
                <h4>
                    {{ __('tourAdmin.tourCreation.roomService.room_service') }}
                </h4>
                <div class="room_service">
                    <div class="row container">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.roomService.beds') }}</label>
                                <input name="beds[]" type="number" class="form-control @if($errors->tourCreation->first('beds')) is-invalid @endif">
                                @if($errors->tourCreation->first('beds'))
                                    <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourCreation->first('beds') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.roomService.room_type') }}</label>
                                <input name="room_type[]" type="text" class="form-control @if($errors->tourCreation->first('room_type')) is-invalid @endif">
                                @if($errors->tourCreation->first('room_type'))
                                    <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourCreation->first('room_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.roomService.room_service') }}</label>
                                <input name="room_service[]" type="text" class="form-control @if($errors->tourCreation->first('room_service')) is-invalid @endif">
                                @if($errors->tourCreation->first('room_service'))
                                    <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourCreation->first('room_service') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.roomService.room_service_price') }}</label>
                                <input name="room_service_price[]" type="text" class="form-control @if($errors->tourCreation->first('room_service_price')) is-invalid @endif">
                                @if($errors->tourCreation->first('room_service_price'))
                                    <span class="container text-danger text-small" role="alert">
                                        <strong>{{ $errors->tourCreation->first('room_service_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div onclick="addRoomService()" class="float-right mr-5 text-primary" style="cursor: pointer;">
                    {{ __('tourAdmin.tourCreation.roomService.create_room') }}
                </div>

                <br>

                <hr style="background-color: #9c27b0; height: 2px">
                <h4>
                    {{ __('tourAdmin.tourCreation.transportationService.transportation_service') }}
                </h4>
                <div class="row container">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.transportationService.vehicle') }}</label>
                            <input name="vehicle[]" type="text" class="form-control @if($errors->tourCreation->first('vehicle')) is-invalid @endif">
                            @if($errors->tourCreation->first('vehicle'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('vehicle') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.transportationService.transition_type') }}</label>
                            <input name="transition_type[]" type="text" class="form-control @if($errors->tourCreation->first('transition_type')) is-invalid @endif">
                            @if($errors->tourCreation->first('transition_type'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('transition_type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row container">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.transportationService.company') }}</label>
                            <input name="company[]" type="text" class="form-control @if($errors->tourCreation->first('company')) is-invalid @endif">
                            @if($errors->tourCreation->first('company'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('company') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.transportationService.transition_service_price') }}</label>
                            <input name="transition_service_price[]" type="text" class="form-control @if($errors->tourCreation->first('transition_service_price')) is-invalid @endif">
                            @if($errors->tourCreation->first('transition_service_price'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('transition_service_price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row container">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.transportationService.origin_address') }}</label>
                            <input name="origin_address[]" type="text" class="form-control @if($errors->tourCreation->first('origin_address')) is-invalid @endif">
                            @if($errors->tourCreation->first('origin_address'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('origin_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.transportationService.destination_address') }}</label>
                            <input name="destination_address[]" type="text" class="form-control @if($errors->tourCreation->first('destination_address')) is-invalid @endif">
                            @if($errors->tourCreation->first('destination_address'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('destination_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row container">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label">{{ __('tourAdmin.tourCreation.transportationService.departure_time') }}</label>
                            <input name="departure_time[]" type="datetime-local" class="form-control @if($errors->tourCreation->first('departure_time')) is-invalid @endif">
                            @if($errors->tourCreation->first('departure_time'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('departure_time') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label">{{ __('tourAdmin.tourCreation.transportationService.arrival_time') }}</label>
                            <input name="arrival_time[]" type="datetime-local" class="form-control @if($errors->tourCreation->first('arrival_time')) is-invalid @endif">
                            @if($errors->tourCreation->first('arrival_time'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('arrival_time') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row container">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Conditions</label>
                            <input name="conditions[]" type="text" class="form-control @if($errors->tourCreation->first('conditions')) is-invalid @endif">
                            @if($errors->tourCreation->first('conditions'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('conditions') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ __('tourAdmin.tourCreation.transportationService.percentage_reduction') }}</label>
                            <input name="percentage_reduction[]" type="number" class="form-control @if($errors->tourCreation->first('percentage_reduction')) is-invalid @endif">
                            @if($errors->tourCreation->first('percentage_reduction'))
                                <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first('percentage_reduction') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


                {{--#TODO CANCEL BUTTON--}}
                <button type="submit" class="btn btn-danger pull-right">{{ __('tourAdmin.list.cancel') }}</button>
                <button type="submit" class="btn btn-success float-right">{{ __('tourAdmin.edit.submit') }}</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function addService()
        {
            var tour_service = "<section>" +
                "<hr style=\"border-top: 1px dashed gray;\">\n" +
                "                <div class=\"row container\">\n" +
                "                    <div class=\"col-md-6\">\n" +
                "                        <div class=\"form-group\">\n" +
                "                            <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.tourService.service') }}</label>\n" +
                "                            <input name=\"service[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('service[]')) is-invalid @endif\">\n" +
                "                            @if($errors->tourCreation->first('service[]'))\n" +
                "                                <span class=\"container text-danger text-small\" role=\"alert\">\n" +
                "                                    <strong>{{ $errors->tourCreation->first('service[]') }}</strong>\n" +
                "                                </span>\n" +
                "                            @endif\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                    <div class=\"col-md-5\">\n" +
                "                        <div class=\"form-group\">\n" +
                "                            <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.tourService.tour_service_price') }}</label>\n" +
                "                            <input name=\"tour_service_price[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('tour_service_price[]')) is-invalid @endif\">\n" +
                "                            @if($errors->tourCreation->first('tour_service_price[]'))\n" +
                "                                <span class=\"container text-danger text-small\" role=\"alert\">\n" +
                "                                    <strong>{{ $errors->tourCreation->first('tour_service_price[]') }}</strong>\n" +
                "                                </span>\n" +
                "                            @endif\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                    <a onclick=\"deleteRow()\" class=\"col-1 mt-5 pt-1 remove\" style=\"cursor: pointer;\">\n" +
                "                        <i class=\"material-icons text-danger\">delete</i>\n" +
                "                    </a>" +
                "                </div>" +
                "               </section>";

            $('.tour_service').append(tour_service);
        }

        function addRoomService()
        {
            var room_service = "<div>\n" +
                "                    <hr style=\"border-top: 1px dashed gray;\">" +
                "                    <div class=\"row container\">" +
                "                        <div class=\"col-11\">\n" +
                "                            <div class=\"row\">\n" +
                "                                <div class=\"col-md-6\">\n" +
                "                                    <div class=\"form-group\">\n" +
                "                                        <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.roomService.beds') }}</label>\n" +
                "                                        <input name=\"beds[]\" type=\"number\" class=\"form-control @if($errors->tourCreation->first('beds')) is-invalid @endif\">\n" +
                "                                            @if($errors->tourCreation->first('beds'))\n" +
                "                                                <span class=\"container text-danger text-small\">\n" +
                "                                                    <strong>{{ $errors->tourCreation->first('beds') }}</strong>\n" +
                "                                                </span>\n" +
                "                                            @endif\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            <div class=\"col-md-6\">\n" +
                "                            <div class=\"form-group\">\n" +
                "                                    <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.roomService.room_type') }}</label>\n" +
                "                                    <input name=\"room_type[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('room_type')) is-invalid @endif\">\n" +
                "                                    @if($errors->tourCreation->first('room_type'))\n" +
                "                                        <span class=\"container text-danger text-small\" role=\"alert\">\n" +
                "                                            <strong>{{ $errors->tourCreation->first('room_type') }}</strong>\n" +
                "                                        </span>\n" +
                "                                    @endif\n" +
                "                                </div>\n" +
                "                           </div>\n" +
                "                       </div>\n" +
                "                        <div class=\"row\">\n" +
                "                            <div class=\"col-md-6\">\n" +
                "                                 <div class=\"form-group\">\n" +
                "                                    <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.roomService.room_service') }}</label>\n" +
                "                                     <input name=\"room_service[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('room_service')) is-invalid @endif\">\n" +
                "                                     @if($errors->tourCreation->first('room_service'))\n" +
                "                                         <span class=\"container text-danger text-small\" role=\"alert\">\n" +
                "                                             <strong>{{ $errors->tourCreation->first('room_service') }}</strong>\n" +
                "                                         </span>\n" +
                "                                     @endif\n" +
                "                                 </div>\n" +
                "                             </div>\n" +
                "                             <div class=\"col-md-6\">\n" +
                "                                 <div class=\"form-group\">\n" +
                "                                     <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.roomService.room_service_price') }}</label>\n" +
                "                                     <input name=\"room_service_price[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('room_service_price')) is-invalid @endif\">\n" +
                "                                     @if($errors->tourCreation->first('room_service_price'))\n" +
                "                                         <span class=\"container text-danger text-small\" role=\"alert\">\n" +
                "                                             <strong>{{ $errors->tourCreation->first('room_service_price') }}</strong>\n" +
                "                                         </span>\n" +
                "                                     @endif\n" +
                "                                 </div>\n" +
                "                             </div>\n" +
                "                         </div>\n" +
                "                       </div>\n" +
                "                       <a onclick=\"deleteRow()\" class=\"col-1 mt-5 pt-1 remove\" style=\"cursor: pointer;\">\n" +
                "                           <i class=\"material-icons text-danger\">delete</i>\n" +
                "                       </a>\n" +
                "                   </div>\n" +
                "               </div>";
            $('.room_service').append(room_service);
        }

        function addService()
        {
            var tour_service = "\n" +
                "                <div class=\"row container\">\n" +
                "                    <div class=\"col-md-6\">\n" +
                "                        <div class=\"form-group\">\n" +
                "                            <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.tourService.service') }}</label>\n" +
                "                            <input name=\"service[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('service[]')) is-invalid @endif\">\n" +
                "                            @if($errors->tourCreation->first('service[]'))\n" +
                "                                <span class=\"container text-danger text-small\" role=\"alert\">\n" +
                "                                    <strong>{{ $errors->tourCreation->first('service[]') }}</strong>\n" +
                "                                </span>\n" +
                "                            @endif\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                    <div class=\"col-md-5\">\n" +
                "                        <div class=\"form-group\">\n" +
                "                            <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.tourService.tour_service_price') }}</label>\n" +
                "                            <input name=\"tour_service_price[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('tour_service_price[]')) is-invalid @endif\">\n" +
                "                            @if($errors->tourCreation->first('tour_service_price[]'))\n" +
                "                                <span class=\"container text-danger text-small\" role=\"alert\">\n" +
                "                                    <strong>{{ $errors->tourCreation->first('tour_service_price[]') }}</strong>\n" +
                "                                </span>\n" +
                "                            @endif\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                    <a onclick=\"deleteRow()\" class=\"col-1 mt-5 pt-1 remove\" style=\"cursor: pointer;\">\n" +
                "                        <i class=\"material-icons text-danger\">delete</i>\n" +
                "                    </a>" +
                "                </div>";

            $('.tour_service').append(tour_service);
        }

        function deleteRow()
        {
            $(document).on('click', '.remove', function()
            {
                $(this).parents().eq(1).remove();
            });
        }
    </script>
@endpush
