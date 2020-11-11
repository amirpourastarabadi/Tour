<div class="col-md-6">
    <div class="form-group">
        <label class="bmd-label{{ $CLASS ?? '-floating' }}">{{ $LABEL }}</label>
        <input name="{{ $NAME }}" type="{{ $TYPE }}" class="form-control @if($errors->tourCreation->first($ERROR ?? $NAME)) is-invalid @endif" value="{{ $FIELD }}">
        @if($errors->tourCreation->first($ERROR ?? $NAME))
            <span class="container text-danger text-small" role="alert">
                <strong>{{ $errors->tourCreation->first($ERROR ?? $NAME) }}</strong>
            </span>
        @endif
    </div>
</div>
