<tbody>
@foreach($tour->passengers as $passenger)
    <tr>
        <td>{{$passenger->user->first_name.", ".$passenger->user->last_name}}</td>
        <td>{{$passenger->user->mobile_number}}</td>
        <td>{{$passenger->tour($tour)->created_at}}</td>
        <td>{{$passenger->tour($tour)->count}}</td>
        <td class="td-actions">
            @if($tour->hasCapacity())
                <a href="{{ route('tourAdmin.reservation.destroy', $tour) }}" class="btn btn-danger"
                   title="Cancel">
                    <i class="material-icons">cancel</i>
                </a>
            @else
                <a href="" class="btn btn-dark"
                   title="Full">
                    <i class="material-icons">add</i>
                </a>
            @endif
            <a href="{{ route('tourAdmin.reservation.edit', $tour) }}" class="btn btn-info" title="Edit">
                <i class="material-icons">edit</i>
            </a>
        </td>
    </tr>
@endforeach
</tbody>
