<div class="col-md-4">
    <div class="form-group">
        <label class="bmd-label mr-3 text-danger">{{ __('tourAdmin.list.delete') }}</label>
        <select class="form-control selectpicker col-6"
                data-style="btn btn-link" name="{{ $NAME }}">
            <option value="0">
                {{ __('tourAdmin.tourCreation.tour.no') }}
            </option>
            <option value="1">
                {{ __('tourAdmin.tourCreation.tour.yes') }}
            </option>
        </select>
    </div>
</div>
