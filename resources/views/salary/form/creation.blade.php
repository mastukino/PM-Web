<form action="{{route('invoices.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label class="required">Invoice No.</label>
        <input type="text"  class="form-control" disabled placeholder="AUTO GENERATE">
    </div>
    <div class="form-group">
        <label>Project</label>
        <select name="project_id" class="form-control">
            @foreach ($projects as $project)
            <option value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Total Hour(s)</label>
        <input type="number" name="total_hour" class="form-control">
    </div>
    <div class="form-group">
        <label>Rate/Hour</label>
        <input type="number" name="rate"class="form-control">
    </div>
    <div class="form-group">
        <label>Subtotal (Rp)</label>
        <input type="number" min="0" name="subtotal"class="form-control">
    </div>
    <div class="form-group">
        <label>Discount (Rp)</label>
        <input type="number" name="discount" min="0" class="form-control" value="0">
    </div>
    <div class="form-group">
        <label>Tax Rate (%)</label>
        <input type="number" name="tax" min="0" class="form-control" value="0">
    </div>
    <div class="form-group">
        <label>Tax Value (Rp)</label>
        <input type="number" name="tax_value" min="0" class="form-control" value="0">
    </div>
    <div class="form-group">
        <label>Total (Rp)</label>
        <input type="number" name="total" min="0" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
@section('js')
<script>

</script>
@endsection
