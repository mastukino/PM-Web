<form action="{{route('projects.update',['id' => $project->id])}}" method="post">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="form-group">
        <label class="required">Name</label>
        <input type="text" name="name" class="form-control" value="{{$project->name}}">
    </div>
    <div class="form-group">
        <label>Customer</label>
        <select name="customer_id" class="form-control">
            @foreach ($customers as $customer)
            <option @if($project->customer->id == $customer->id) selected @endif
                value="{{$customer->id}}">{{$customer->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" cols="30" rows="10" class="form-control">{!! $project->description !!}</textarea>
    </div>
    <div class="form-group">
        <label>Employees</label>
        <select class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Select employee"
            style="width: 100%;" data-select2-id="23" tabindex="-1" id="employees" aria-hidden="true"
            name="employees[]">
            @foreach ($employees as $item)
            <option
                @foreach ($assigned_employee as $value)
                    @if($value->employee_id == $item->id)
                        selected
                    @endif
                @endforeach
                value="{{$item->id}}">
                {{$item->name}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
@section('js')
<script>
    $("#employees").select2({
        allowClear:true,
      });
</script>
@endsection
