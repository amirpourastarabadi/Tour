@extends('layouts.passenger')

@section('content')

    <h3>{{ __('passenger.tours_list.list') }}</h3>
    <table class="table">
        <thead>
        <tr>
            <th>{{ __('passenger.tours_list.hotel_name') }}</th>
            <th>{{ __('passenger.tours_list.origin') }}</th>
            <th>{{ __('passenger.tours_list.destination') }}</th>
            <th>{{ __('passenger.tours_list.start_at') }}</th>
            <th>{{ __('passenger.tours_list.duration') }}</th>
            <th class="text-center">{{ __('passenger.list.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tours as $tour)
            <tr>
                <td>{{ $tour->hotel->name }}</td>
                <td>{{ $tour->origin }}</td>
                <td>{{ $tour->destination }}</td>
                <td>{{ $tour->start_at }}</td>
                <td>{{ $tour->duration }}</td>

                <td class="td-actions text-center d-flex justify-content-between">
                    <form action="{{ route('passenger.reservation.show', $tour) }}" method="GET">
                        <button type="submit" rel="tooltip" class="btn btn-info" title="{{ __('passenger.list.info') }}">
                            <i class="material-icons">commute</i>
                        </button>
                    </form>

                    <form action="{{ route('passenger.reservation.destroy', $tour) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('{{ __('passenger.alerts.tour.cancel_tour') }}')"
                                rel="tooltip" class="btn btn-danger" title="{{ __('passenger.tours_list.cancel') }}">
                            <i class="material-icons">close</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--#TODO create modals--}}
@endsection
