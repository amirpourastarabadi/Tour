<tbody>
@foreach($tours as $tour)
    <tr>
        <td>{{$tour->origin}}</td>
        <td>{{$tour->destination}}</td>
        <td>{{$tour->start_at}}</td>
        <td class="text-center">{{$tour->duration}}</td>
        <td>{{$tour->prettyPrice($tour->price)}}</td>
        <td class="text-center">{{$tour->total_num}}</td>
        <td class="text-center">{{$tour->total_num - $tour->filled_num}}</td>

        <td class="td-actions text-center d-flex justify-content-between">
            @if($tour->hasCapacity())
                <a href="{{ route('tourAdmin.reservation.create', $tour) }}" class="btn btn-success"
                                       title="Reservation">
                <i class="material-icons">add</i>
            </a>
            @else
                <btn class="btn btn-dark"
                   title="Full">
                    <i class="material-icons">add</i>
                </btn>
            @endif
            <a href="{{ route('tourAdmin.reservation.show', $tour) }}" class="btn btn-info" title="Tour List">
                <i class="material-icons">view_list</i>
            </a>
        </td>
    </tr>
@endforeach
</tbody>
