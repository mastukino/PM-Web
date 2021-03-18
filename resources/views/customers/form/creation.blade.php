<form action="{{route('customers.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label class="required">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Code</label>
        <input type="text" name="code" class="form-control">
    </div>
    <div class="form-group">
        <label>Contact Person</label>
        <input type="text" name="contact_person" class="form-control">
    </div>
    <div class="form-group">
        <label>Tel.</label>
        <input type="tel" name="tel" class="form-control">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="tel" name="phone" class="form-control">
    </div>
    <div class="form-group">
        <label>Fax</label>
        <input type="text" name="fax" class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea name="address" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
