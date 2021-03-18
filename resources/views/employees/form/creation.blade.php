<form action="{{route('employees.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label class="required">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="tel" name="phone" class="form-control">
    </div>
    <div class="form-group">
        <label>DOB</label>
        <input type="date" name="dob" class="form-control">
    </div>
    <div class="form-group">
        <label>Salary (Rp.)</label>
        <input type="number" min="1000000" name="salary" class="form-control">
    </div>
    <div class="form-group">
        <label>Initial</label>
        <input type="text" name="initial" class="form-control">
    </div>
    <div class="form-group">
        <label>Position</label>
        <input type="text" name="position" class="form-control">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea name="address" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
