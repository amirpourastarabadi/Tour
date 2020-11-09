<div class=" col-md-6">
    <div class="form-group">
        <label
            class="bmd-label mr-3">{{ $LABLE }}</label>
        <select
            class="form-control selectpicker col-5 @if($errors->tourCreation->first($NAME)) is-invalid @endif"
            data-style="btn btn-link" name={{$NAME}}>
            <option value="1">
                {{ __('tourAdmin.tourCreation.tour.yes') }}
            </option>
            <option value="0">
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
