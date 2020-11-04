<fieldset>
    <legend> tour information</legend>
    <div class="form-row mt-3">
        <div class="form-group bmd-form-group col-md-3">
            <label class="form-label">Origin</label>
            <input type="text" class="form-control" value="{{$TOUR->origin}}" disabled >
        </div>
        <div class="form-group bmd-form-group col-md-3">
            <label class="form-label">Destination</label>
            <input type="text" class="form-control" value="{{$TOUR->destination}}" disabled>
        </div>
        <div class="form-group bmd-form-group col-md-3">
            <label class="form-label">Data</label>
            <input type="text" class="form-control" value="{{$TOUR->start_at}}" disabled>
        </div>
        <div class="form-group bmd-form-group col-md-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" value="{{$TOUR->prettyPrice($TOUR->price)}}" disabled>
        </div>
    </div>
</fieldset>
