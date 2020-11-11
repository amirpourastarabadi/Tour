@extends('layouts.tourAdmin')

@section('content')

    <h3>{{ __('tourAdmin.tours_list.list') }}</h3>
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>{{ __('tourAdmin.tours_list.hotel_name') }}</th>
            <th>{{ __('tourAdmin.tourCreation.tour.origin') }}</th>
            <th>{{ __('tourAdmin.tourCreation.tour.destination') }}</th>
            <th>{{ __('tourAdmin.tourCreation.tour.start_at') }}</th>
            <th>{{ __('tourAdmin.tourCreation.tour.duration') }}</th>
            <th>{{ __('tourAdmin.tours_list.left') }}</th>
            <th class="text-center">{{ __('tourAdmin.list.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tours as $tour)
            <tr>
                <td class="text-center">{{ $count++ }}</td>
                <td>{{ $tour->hotel->name }}</td>
                <td>{{ $tour->origin }}</td>
                <td>{{ $tour->destination }}</td>
                <td>{{ $tour->start_at }}</td>
                <td>{{ $tour->duration }}</td>
                <td>{{ $tour->total_num - $tour->filled_num}}</td>

                <td class="td-actions text-center d-flex justify-content-between">
                    <form action="{{ route('tourAdmin.tour.show', $tour) }}" method="GET">
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-info" title="{{ __('tourAdmin.list.info') }}">
                            <i class="material-icons">commute</i>
                        </button>
                    </form>

                    <form action="{{ route('tourAdmin.tour.edit', $tour) }}" method="GET">
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-success" title="{{ __('tourAdmin.list.edit') }}">
                            <i class="material-icons">edit</i>
                        </button>
                    </form>

                    <form action="{{ route('tourAdmin.tour.destroy', $tour) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('{{ __('tourAdmin.list.confirm_delete', ['origin' => $tour->origin, 'destination' => $tour->destination, 'hotel_name' => $tour->hotel->name]) }}')"
                                rel="tooltip" class="btn btn-danger" title="{{ __('tourAdmin.list.delete') }}">
                            <i class="material-icons">close</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>{{ $tours->links() }}</div>
    {{--#TODO create modals--}}
@endsection
