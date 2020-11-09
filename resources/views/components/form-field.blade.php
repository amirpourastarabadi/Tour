<div class="col-md-6">
    <div class="form-group">
        <label class="bmd-label{{$CLASS ?? '-floating'}}">{{$LABLE}}</label>
        <input name="{{$NAME}}" type="{{$TYPE}}"
               class="form-control @if($errors->tourCreation->first($ERROE ?? $NAME)) is-invalid @endif">
        @if($errors->tourCreation->first($ERROE ?? $NAME))
            <span class="container text-danger text-small" role="alert">
                                    <strong>{{ $errors->tourCreation->first($ERROE ?? $NAME) }}</strong>
                                </span>
        @endif
    </div>
</div>
