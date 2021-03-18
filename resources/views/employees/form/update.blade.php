<form action="{{route('employees.update',['id' => $employee->id])}}" method="post">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="form-group">
        <label class="required">Name</label>
        <input type="text" name="name" class="form-control" value="{{$employee->name}}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{$employee->email}}">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="tel" name="phone" class="form-control" value="{{$employee->phone}}">
    </div>
    <div class="form-group">
        <label>DOB</label>
        <input type="date" name="dob" class="form-control" value="{{$employee->dob}}">
    </div>
    <div class="form-group">
        <label>Salary (Rp.)</label>
        <input type="number" min="1000000" name="salary" class="form-control" value="{{$employee->salary}}">
    </div>
    <div class="form-group">
        <label>Initial</label>
        <input type="text" name="initial" class="form-control" value="{{$employee->initial}}">
    </div>
    <div class="form-group">
        <label>Position</label>
        <input type="text" name="position" class="form-control" value="{{$employee->position}}">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea name="address" cols="30" rows="10" class="form-control">{!!$employee->address!!}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
