<div class=" col-md-6">
    <div class="form-group">
        <label
            class="bmd-label mr-3">{{ $LABEL }}</label>
        <select
            class="form-control selectpicker col-5 @if($errors->tourCreation->first($NAME)) is-invalid @endif"
            data-style="btn btn-link" name={{ $NAME }}>
            <option value="1" @if($CHECK == 1) selected @endif>
                {{ __('tourAdmin.tourCreation.tour.yes') }}
            </option>
            <option value="0" @if($CHECK == 0) selected @endif>
                {{ __('tourAdmin.tourCreation.tour.no') }}
            </option>
        </select>
        @if($errors->tourCreation->first($NAME))
            <span class="container text-danger text-small" role="alert">
                <strong>{{ $errors->tourCreation->first($NAME) }}</strong>
            </span>
        @endif
    </div>
</div>
