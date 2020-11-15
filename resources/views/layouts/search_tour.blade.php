
<div class="container mt-5" style="background-image: url({{asset('images/banner.jpg')}}); height: 400px">
    <div class="row">
        <form action="{{route('search.index')}}" method="get" class="form-inline"
              style="margin-top: 230px; height: 170px;width: 100%; background-color: rgba(0,0,0,.7)">
            <div class="form-group bmd-form-group ml-5">
                <label>Origin</label>
                <div class="input-group">
                    <input name="origin" type="text" value="{{$test_item->origin}}"
                           class="form-control text-light text-bolder" required>
                </div>
            </div>
            <div class="form-group bmd-form-group ml-2">
                <label>Destination</label>
                <div class="input-group">
                    <input name="destination" type="text" value="{{$test_item->destination}}"
                           class="form-control text-light text-bolder" required>
                </div>
            </div>
            <div class="form-group bmd-form-group ml-4">
                <label>Date</label>
                <div class="input-group">

                    <input name="start_at" type="date" value="{{$test_item->start_at}}"
                           class="form-control text-light" required>
                </div>
            </div>
            <div class="form-group bmd-form-group ml-2">
                <label>Duration</label>
                <div class="input-group">

                    <input name="duration" type="number" value="{{$test_item->duration}}"
                           class="form-control text-light" required>
                </div>
            </div>
            <div class="form-group bmd-form-group ml-4">
                <label>Number of tickets</label>
                <div class="input-group">
                    <input name="count" type="text" max="10" min="1" required value="2"
                           class="form-control text-light">
                </div>
            </div>


            <input type="submit" value="GO" class="btn btn-info btn-warning ml-5">
        </form>
    </div>
</div>

<script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/plugins/bootstrap-selectpicker.js')}}"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src=" {{asset('assets/js/material-dashboard.min.js?v=2.1.2') }}" type="text/javascript"></script>

