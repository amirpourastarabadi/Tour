<div class="col-md-6">
    <div class="form-group">
        <label class="bmd-label{{ $CLASS ?? '-floating' }}">{{ $LABEL }}</label>
        <input name="{{ $NAME }}" type="{{ $TYPE }}" required class="form-control @if($errors->passengerEdit->first($NAME)) is-invalid @endif" value="{{ $FIELD }}">
        @if($errors->passengerEdit->first($NAME))
            <span class="container text-danger text-small" role="alert">
                <strong>{{ $errors->passengerEdit->first($NAME) }}</strong>
            </span>
        @endif
    </div>
</div>
