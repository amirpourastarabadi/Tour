@extends('layouts.tourAdmin')

@section('content')
    <div class="modal-content">
        <div class="card card-signup card-plain">
            <div class="modal-header">
                <div class="card-header card-header-primary text-center">

                    <h4 class="card-title">{{ __('tourAdmin.show.header') }}</h4>
                    <br>
                    <ul class="container justify-content-around nav nav-tabs md-tabs tabs-2">

                        <li class="nav-item">
                            <a class="nav-link active d-inline-flex" id="passenger" data-toggle="tab" href="#tourInformationTab">
                                <i class="material-icons">card_travel</i>
                                <p>{{ __('tourAdmin.show.header') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-inline-flex" id="tourAdmin" data-toggle="tab" href="#tourServicesTab">
                                <i class="material-icons">room_service</i>
                                <p>{{ __('tourAdmin.tourCreation.tourService.tour_service') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-inline-flex" id="tourAdmin" data-toggle="tab" href="#roomServicesTab">
                                <i class="material-icons">hotel</i>
                                <p>{{ __('tourAdmin.tourCreation.roomService.service') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-inline-flex" id="tourAdmin" data-toggle="tab" href="#transportationServiceTab">
                                <i class="material-icons">flight</i>
                                <p>{{ __('tourAdmin.tourCreation.transportationService.service') }}</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- Tab panels -->
            <div class="tab-content ml-2" style="width: 90%">
                <!-- Tour Information Tab -->
                <div class="tab-pane fade in show active" id="tourInformationTab">

                    <br/>
                    <div class="row container ml-2">

                        @component('components.tourAdmin.tour.show-fields', [
                                    'NAME' => __('tourAdmin.tours_list.hotel_name'),
                                    'VALUE' => $tour->hotel->name,
                                    ])
                        @endcomponent

                        <div class="col-md-6">
                            <div class="form-group" style="font-size: 20px;">
                                {{ __('tourAdmin.show.stars') }}:

                                @for($i = 0; $i < $tour->hotel->stars; $i++)
                                    <i class="material-icons text-warning ml-2" style="font-size: 22px;">star_rate</i>
                                @endfor

                            </div>
                        </div>

                    </div>

                    <br/>
                    <div class="row container ml-2">

                        @component('components.tourAdmin.tour.show-fields', [
                                    'NAME' => __('tourAdmin.tourCreation.tour.origin'),
                                    'VALUE' => $tour->origin,
                                    ])
                        @endcomponent

                        @component('components.tourAdmin.tour.show-fields', [
                                    'NAME' => __('tourAdmin.tourCreation.tour.destination'),
                                    'VALUE' => $tour->destination,
                                    ])
                        @endcomponent

                    </div>

                    <br/>
                    <div class="row container ml-2">

                        @component('components.tourAdmin.tour.show-fields', [
                                    'NAME' => __('tourAdmin.tourCreation.tour.start_at'),
                                    'VALUE' => $tour->start_at,
                                    ])
                        @endcomponent

                        @component('components.tourAdmin.tour.show-fields', [
                                    'NAME' => __('tourAdmin.tourCreation.tour.duration'),
                                    'VALUE' => $tour->duration,
                                    ])
                        @endcomponent

                    </div>

                    <br/>
                    <div class="row container ml-2">

                        @component('components.tourAdmin.tour.show-fields', [
                                    'NAME' => __('tourAdmin.tourCreation.tour.price'),
                                    'VALUE' => $tour->price,
                                    ])
                        @endcomponent

                        @component('components.tourAdmin.tour.show-fields', [
                                    'NAME' => __('tourAdmin.tourCreation.tour.tour_num'),
                                    'VALUE' => $tour->total_num,
                                    ])
                        @endcomponent

                    </div>

                    <br/>
                    <div class="row container ml-2">

                        @component('components.tourAdmin.tour.show-fields', [
                                    'NAME' => __('tourAdmin.show.filled'),
                                    'VALUE' => $tour->filled_num,
                                    ])
                        @endcomponent

                        <div class="col-md-6">
                            <div class="form-group" style="font-size: 20px;">
                                {{ __('tourAdmin.show.remain') }}: <span class="text-primary text-bold">{{ $tour->total_num - $tour->filled_num }}</span>
                            </div>
                        </div>

                    </div>

                    <br/>
                    <div class="row container ml-2">

                        <div class="col-md-6">
                            <div class="form-group" style="font-size: 20px;">
                                {{ __('tourAdmin.tourCreation.tour.marriage_certificates') }}: <span class="text-primary text-bold">
                                    @if($tour->marriage_certificates == 1)
                                        {{ __('tourAdmin.tourCreation.tour.yes') }}
                                    @else
                                        {{ __('tourAdmin.tourCreation.tour.no') }}
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group" style="font-size: 20px;">
                                {{ __('tourAdmin.tourCreation.tour.personal_certificates') }}: <span class="text-primary text-bold">
                                    @if($tour->personal_certificates == 1)
                                        {{ __('tourAdmin.tourCreation.tour.yes') }}
                                    @else
                                        {{ __('tourAdmin.tourCreation.tour.no') }}
                                    @endif
                                </span>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Tour Services Tab -->
                <div class="tab-pane fade" id="tourServicesTab">

                    @foreach($tour->tourServices as $tourService)
                        <br/>
                        <div class="row container ml-2">

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.tourService.tour_service'),
                                        'VALUE' => $tourService->service,
                                        ])
                            @endcomponent

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.tourService.tour_service_price'),
                                        'VALUE' => $tourService->tour_service_price,
                                        ])
                            @endcomponent

                        </div>

                        <hr style="border-top: 1px dashed gray;">
                    @endforeach

                </div>

                <!-- Room Services Tab -->
                <div class="tab-pane fade" id="roomServicesTab">

                    @foreach($tour->roomServices as $roomService)
                        <br/>
                        <div class="row container ml-2">

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.roomService.beds'),
                                        'VALUE' => $roomService->beds,
                                        ])
                            @endcomponent

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.roomService.room_type'),
                                        'VALUE' => $roomService->room_type,
                                        ])
                            @endcomponent

                        </div>

                        <br/>
                        <div class="row container ml-2">

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.roomService.room_service'),
                                        'VALUE' => $roomService->room_service,
                                        ])
                            @endcomponent

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.roomService.room_service_price'),
                                        'VALUE' => $roomService->room_service_price,
                                        ])
                            @endcomponent

                        </div>

                        <hr style="border-top: 1px dashed gray;">

                    @endforeach

                </div>

                <!-- Transportation Service Tab -->
                <div class="tab-pane fade" id="transportationServiceTab">

                    @foreach($tour->transportationServices as $transportationService)
                        <br/>
                        <div class="row container ml-2">

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.vehicle'),
                                        'VALUE' => $transportationService->vehicle,
                                        ])
                            @endcomponent

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.transition_type'),
                                        'VALUE' => $transportationService->transition_type,
                                        ])
                            @endcomponent

                        </div>

                        <br/>
                        <div class="row container ml-2">

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.company'),
                                        'VALUE' => $transportationService->company,
                                        ])
                            @endcomponent

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.transition_service_price'),
                                        'VALUE' => $transportationService->transition_service_price,
                                        ])
                            @endcomponent

                        </div>

                        <br/>
                        <div class="row container ml-2">

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.origin_address'),
                                        'VALUE' => $transportationService->origin_address,
                                        ])
                            @endcomponent

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.destination_address'),
                                        'VALUE' => $transportationService->destination_address,
                                        ])
                            @endcomponent

                        </div>

                        <br/>
                        <div class="row container ml-2">

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.departure_time'),
                                        'VALUE' => $transportationService->departure_time,
                                        ])
                            @endcomponent

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.arrival_time'),
                                        'VALUE' => $transportationService->arrival_time,
                                        ])
                            @endcomponent

                        </div>

                        <br/>
                        <div class="row container ml-2">

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.conditions'),
                                        'VALUE' => $transportationService->conditions,
                                        ])
                            @endcomponent

                            @component('components.tourAdmin.tour.show-fields', [
                                        'NAME' => __('tourAdmin.tourCreation.transportationService.percentage_reduction'),
                                        'VALUE' => $transportationService->percentage_reduction,
                                        ])
                            @endcomponent

                        </div>

                        <hr style="border-top: 1px dashed gray;">

                    @endforeach

                </div>

            </div>
        </div>
    </div>

    <div>
        <form action="{{ route('tourAdmin.tour.destroy', $tour) }}" method="POST">
            @csrf
            @method('DELETE')

            <a href="{{ route('tourAdmin.tour.edit', $tour) }}" type="submit" class="btn btn-success"
               onclick="return confirm('{{ __('tourAdmin.alerts.tour.confirm_edit') }}');">
                {{ __('tourAdmin.show.edit') }}
            </a>

            <a href="{{ route('tourAdmin.tour.index') }}" type="submit" class="btn btn-info text-light"
               onclick="return confirm('{{ __('tourAdmin.alerts.tour.confirm_back') }}');">
                {{ __('tourAdmin.list.back') }}
            </a>

            <button type="submit" class="btn btn-danger text-light float-right"
                    onclick="return confirm('{{ __('tourAdmin.list.confirm_delete', ['origin' => $tour->origin, 'destination' => $tour->destination, 'hotel_name' => $tour->hotel->name]) }}');">
                {{ __('tourAdmin.show.delete') }}
            </button>
        </form>
    </div>

@endsection
