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
                @component('components.tourAdmin.tour.form-field', [
                                'LABEL'   => __('tourAdmin.tourCreation.tour.origin'),
                                'NAME'    => 'origin',
                                'TYPE'    => 'text',
                                ])
                @endcomponent

                @component('components.tourAdmin.tour.form-field', [
                                'LABEL'   => __('tourAdmin.tourCreation.tour.destination'),
                                'NAME'    => 'destination',
                                'TYPE'    =>'text',
                                ])
                @endcomponent

            </div>
            <div class="row">

                @component('components.tourAdmin.tour.form-field', [
                                'LABEL'    => __('tourAdmin.tourCreation.tour.start_at'),
                                'NAME'     => 'start_at',
                                'TYPE'     => 'date',
                                'CLASS'    =>'',
                                ])
                @endcomponent

                @component('components.tourAdmin.tour.form-field', [
                                'LABEL'   => __('tourAdmin.tourCreation.tour.duration'),
                                'NAME'    => 'duration',
                                'TYPE'    => 'number',
                                ])
                @endcomponent

            </div>
            <div class="row">

                @component('components.tourAdmin.tour.form-field', [
                                'LABEL'   => __('tourAdmin.tourCreation.tour.price'),
                                'NAME'    => 'price',
                                'TYPE'    => 'text',
                                ])
                @endcomponent

                @component('components.tourAdmin.tour.form-field', [
                                'LABEL'   => __('tourAdmin.tourCreation.tour.tour_num'),
                                'NAME'    => 'total_num',
                                'TYPE'    => 'number',
                                ])
                @endcomponent

            </div>
            <div class="row">

                @component('components.tourAdmin.tour.form-select', [
                                'LABEL'  => __('tourAdmin.tourCreation.tour.personal_certificates'),
                                'NAME'   => 'personal_certificates',
                                ])
                @endcomponent

                @component('components.tourAdmin.tour.form-select', [
                                'LABEL'  => __('tourAdmin.tourCreation.tour.marriage_certificates'),
                                'NAME'   => 'marriage_certificates',
                                ])
                @endcomponent

            </div>

            <br>

            <hr style="background-color: #9c27b0; height: 2px">
            <h4>
                {{ __('tourAdmin.tourCreation.tourService.tour_service') }}
            </h4>
            <div class="tour_service">
                <div class="row container">

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'   => __('tourAdmin.tourCreation.tourService.service'),
                                    'NAME'    => 'service[]',
                                    'TYPE'    => 'text',
                                    'ERROR'   => 'service',
                                    ])
                    @endcomponent

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'    => __('tourAdmin.tourCreation.tourService.tour_service_price'),
                                    'NAME'     => 'tour_service_price[]',
                                    'TYPE'     => 'text',
                                    'ERROR'    => 'tour_service_price',
                                    ])
                    @endcomponent

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

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'    => __('tourAdmin.tourCreation.roomService.beds'),
                                    'NAME'     => 'beds[]',
                                    'TYPE'     => 'number',
                                    'ERROR'    => 'beds',
                                    ])
                    @endcomponent

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'    => __('tourAdmin.tourCreation.roomService.room_type'),
                                    'NAME'     => 'room_type[]',
                                    'TYPE'     => 'text',
                                    'ERROR'    => 'room_type',
                                    ])
                    @endcomponent

                </div>
                <div class="row container">

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'  => __('tourAdmin.tourCreation.roomService.room_service'),
                                    'NAME'   => 'room_service[]',
                                    'TYPE'   => 'text',
                                    'ERROR'  => 'room_service',
                                    ])
                    @endcomponent

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'   => __('tourAdmin.tourCreation.roomService.room_service_price'),
                                    'NAME'    => 'room_service_price[]',
                                    'TYPE'    => 'text',
                                    'ERROR'   => 'room_service_price',
                                    ])
                    @endcomponent

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
            <div class="transportation_service">
                <div class="row container">

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'   => __('tourAdmin.tourCreation.transportationService.vehicle'),
                                    'NAME'    => 'vehicle[]',
                                    'TYPE'    => 'text',
                                    'ERROR'   => 'vehicle',
                                    ])
                    @endcomponent

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'   => __('tourAdmin.tourCreation.transportationService.transition_type'),
                                    'NAME'    => 'transition_type[]',
                                    'TYPE'    => 'text',
                                    'ERROR'   => 'transition_type',
                                    ])
                    @endcomponent

                </div>
                <div class="row container">

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'   => __('tourAdmin.tourCreation.transportationService.company'),
                                    'NAME'    => 'company[]',
                                    'TYPE'    => 'text',
                                    'ERROR'   => 'company',
                                    ])
                    @endcomponent

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'   => __('tourAdmin.tourCreation.transportationService.transition_service_price'),
                                    'NAME'    => 'transition_service_price[]',
                                    'TYPE'    => 'text',
                                    'ERROR'   => 'transition_service_price',
                                    ])
                    @endcomponent

                </div>

                <div class="row container">

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'     => __('tourAdmin.tourCreation.transportationService.origin_address'),
                                    'NAME'      => 'origin_address[]',
                                    'TYPE'      => 'text',
                                    'ERROR'     => 'origin_address',
                                    ])
                    @endcomponent

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'     => __('tourAdmin.tourCreation.transportationService.destination_address'),
                                    'NAME'      => 'destination_address[]',
                                    'TYPE'      => 'text',
                                    'ERROR'     => 'destination_address',
                                    ])
                    @endcomponent

                </div>

                <div class="row container">

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'     => __('tourAdmin.tourCreation.transportationService.departure_time'),
                                    'NAME'      => 'departure_time[]',
                                    'TYPE'      => 'datetime-local',
                                    'ERROR'     => 'departure_time',
                                    'CLASS'     => ''
                                    ])
                    @endcomponent

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'     => __('tourAdmin.tourCreation.transportationService.arrival_time'),
                                    'NAME'      => 'arrival_time[]',
                                    'TYPE'      => 'datetime-local',
                                    'ERROR'     => 'arrival_time',
                                    'CLASS'     => ''
                                    ])
                    @endcomponent

                </div>
                <div class="row container">

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'     => __('tourAdmin.tourCreation.transportationService.conditions'),
                                    'NAME'      => 'conditions[]',
                                    'TYPE'      => 'text',
                                    'ERROR'     => 'conditions'
                                    ])
                    @endcomponent

                    @component('components.tourAdmin.tour.form-field', [
                                    'LABEL'     => __('tourAdmin.tourCreation.transportationService.percentage_reduction'),
                                    'NAME'      => 'percentage_reduction[]',
                                    'TYPE'      => 'number',
                                    'ERROR'     => 'percentage_reduction'
                                    ])
                    @endcomponent

                </div>
            </div>
            <div onclick="addTransportationService()" class="float-right mr-5 text-primary" style="cursor: pointer;">
                {{ __('tourAdmin.tourCreation.transportationService.create_transportation') }}
            </div>

            <br/><br/>

            <a href="{{ route('tourAdmin.tour.index') }}" type="submit" class="btn btn-danger pull-right"
               onclick="return confirm('{{ __('tourAdmin.alerts.tour.cancel_create') }}');">{{ __('tourAdmin.list.cancel') }}</a>
            <button type="submit" class="btn btn-success float-right"
               onclick="return confirm('{{ __('tourAdmin.alerts.tour.confirm_create') }}');">{{ __('tourAdmin.edit.submit') }}</button>
        </form>
    </div>
@endsection

@push('js')
    <script>
    function addService() {
        var tour_service = "<div>" +
        "               <hr style=\"border-top: 1px dashed gray;\">\n" +
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
        "               </div>";

        $('.tour_service').append(tour_service);
    }

    function addRoomService() {
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

    function addTransportationService() {
        var transportation_service = "<div>\n" +
            "                    <hr style=\"border-top: 1px dashed gray;\">\n" +
            "\n" +
            "                    <div class=\"row container\">\n" +
            "                        <div class=\"col-11\">\n" +
            "\n" +
            "                        <div class=\"row\">\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.transportationService.vehicle') }}</label>\n" +
            "                                <input name=\"vehicle[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('vehicle')) is-invalid @endif\" value=\"{{ old('vehicle') }}\">\n" +
            "                                @if($errors->tourCreation->first('vehicle'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                        <strong>{{ $errors->tourCreation->first('vehicle') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.transportationService.transition_type') }}</label>\n" +
            "                                <input name=\"transition_type[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('transition_type')) is-invalid @endif\" value=\"{{ old('transition_type') }}\">\n" +
            "                                @if($errors->tourCreation->first('transition_type'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                        <strong>{{ $errors->tourCreation->first('transition_type') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                    </div>\n" +
            "                        <div class=\"row\">\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.transportationService.company') }}</label>\n" +
            "                                <input name=\"company[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('company')) is-invalid @endif\" value=\"{{ old('company') }}\">\n" +
            "                                @if($errors->tourCreation->first('company'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                        <strong>{{ $errors->tourCreation->first('company') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.transportationService.transition_service_price') }}</label>\n" +
            "                                <input name=\"transition_service_price[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('transition_service_price')) is-invalid @endif\" value=\"{{ old('transition_service_price') }}\">\n" +
            "                                @if($errors->tourCreation->first('transition_service_price'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                        <strong>{{ $errors->tourCreation->first('transition_service_price') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                    </div>\n" +
            "\n" +
            "                        <div class=\"row\">\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.transportationService.origin_address') }}</label>\n" +
            "                                <input name=\"origin_address[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('origin_address')) is-invalid @endif\" value=\"{{ old('origin_address') }}\">\n" +
            "                                @if($errors->tourCreation->first('origin_address'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                        <strong>{{ $errors->tourCreation->first('origin_address') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.transportationService.destination_address') }}</label>\n" +
            "                                <input name=\"destination_address[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('destination_address')) is-invalid @endif\" value=\"{{ old('destination_address') }}\">\n" +
            "                                @if($errors->tourCreation->first('destination_address'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                        <strong>{{ $errors->tourCreation->first('destination_address') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                    </div>\n" +
            "\n" +
            "                        <div class=\"row\">\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label\">{{ __('tourAdmin.tourCreation.transportationService.departure_time') }}</label>\n" +
            "                                <input name=\"departure_time[]\" type=\"datetime-local\" class=\"form-control @if($errors->tourCreation->first('departure_time')) is-invalid @endif\" value=\"{{ old('departure_time') }}\">\n" +
            "                                @if($errors->tourCreation->first('departure_time'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                       <strong>{{ $errors->tourCreation->first('departure_time') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label\">{{ __('tourAdmin.tourCreation.transportationService.arrival_time') }}</label>\n" +
            "                                <input name=\"arrival_time[]\" type=\"datetime-local\" class=\"form-control @if($errors->tourCreation->first('arrival_time')) is-invalid @endif\" value=\"{{ old('arrival_time') }}\">\n" +
            "                                @if($errors->tourCreation->first('arrival_time'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                        <strong>{{ $errors->tourCreation->first('arrival_time') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                    </div>\n" +
            "                        <div class=\"row\">\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.transportationService.conditions') }}</label>\n" +
            "                                <input name=\"conditions[]\" type=\"text\" class=\"form-control @if($errors->tourCreation->first('conditions')) is-invalid @endif\" value=\"{{ old('conditions') }}\">\n" +
            "                                @if($errors->tourCreation->first('conditions'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                        <strong>{{ $errors->tourCreation->first('conditions') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class=\"col-md-6\">\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <label class=\"bmd-label-floating\">{{ __('tourAdmin.tourCreation.transportationService.percentage_reduction') }}</label>\n" +
            "                                <input name=\"percentage_reduction[]\" type=\"number\" class=\"form-control @if($errors->tourCreation->first('percentage_reduction')) is-invalid @endif\" value=\"{{ old('percentage_reduction') }}\">\n" +
            "                                @if($errors->tourCreation->first('percentage_reduction'))\n" +
            "                                    <span class=\"container text-danger text-small\" role=\"alert\">\n" +
            "                                        <strong>{{ $errors->tourCreation->first('percentage_reduction') }}</strong>\n" +
            "                                    </span>\n" +
            "                                @endif\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "                    </div>\n" +
            "                        </div>\n" +
            "                        <a onclick=\"deleteRow()\" class=\"col-1 mt-5 pt-5 remove\" style=\"cursor: pointer;\">\n" +
            "                            <i class=\"material-icons text-danger\">delete</i>\n" +
            "                        </a>\n" +
            "                    </div>\n" +
            "                </div>";

        $('.transportation_service').append(transportation_service);
    }

    function deleteRow() {
        $(document).on('click', '.remove', function () {
            $(this).parents().eq(1).remove();
        });
    }
    </script>
@endpush
