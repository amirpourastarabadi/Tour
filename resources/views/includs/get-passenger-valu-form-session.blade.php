@if(session('reservation.user'))
    {{session("reservation.user.$ATTRIBUTE")}}
@else
    {{old($ATTRIBUTE)}}
@endif
