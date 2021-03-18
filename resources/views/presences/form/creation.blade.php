<form class="form-inline" action="{{route('presences.store')}}" method="post">
    @csrf
    <div class="form-group mr-2">
        @if(empty($checkin))
        <input type="submit" class="btn btn-md btn-success form-control" id="btn_check_in" name="check_in" value="Check In">
        @else
        Check In at : {{$checkin->check_in}}
        @endif
    </div>
    <div class="form-group mr-2">
        @if(empty($checkout))
        <input type="submit" class="btn btn-md btn-danger form-control" id="btn_check_out" name="check_out" value="Check Out">
        @else
        Check Out at : {{$checkin->check_out}}
        @endif
    </div>

</form>
