<tbody>
@foreach($tour->passengers as $passenger)
    <tr>
        <td>{{$passenger->user->first_name.", ".$passenger->user->last_name}}</td>
        <td>{{$passenger->user->mobile_number}}</td>
        <td>{{$passenger->tour($tour)->created_at}}</td>
        <td>{{$passenger->tour($tour)->count}}</td>
        <td class="td-actions">
            <form
                action="{{route('tourAdmin.reservation.destroy', [
    'tour' => $tour, 'passenger' => $passenger, 'count' => $passenger->tour($tour)->count
    ])}}"
                method="post" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                        title="Cancel">
                    <i class="material-icons">cancel</i>
                </button>
            </form>
            <a href="{{ route('tourAdmin.reservation.edit', $tour) }}" class="btn btn-info" title="Edit">
                <i class="material-icons">edit</i>
            </a>
        </td>
    </tr>
@endforeach
</tbody>
