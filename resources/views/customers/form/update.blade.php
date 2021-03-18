<form action="{{route('customers.update',['id' => $customer->id])}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{$customer->name}}">
        </div>
        <div class="form-group">
            <label>Code</label>
            <input type="text" name="code" class="form-control" value="{{$customer->code}}">
        </div>
        <div class="form-group">
            <label>Contact Person</label>
            <input type="text" name="contact_person" class="form-control" value="{{$customer->contact_person}}">
        </div>
        <div class="form-group">
            <label>Tel.</label>
            <input type="tel" name="tel" class="form-control" value="{{$customer->tel}}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="tel" name="phone" class="form-control" value="{{$customer->phone}}">
        </div>
        <div class="form-group">
            <label>Fax</label>
            <input type="text" name="fax" class="form-control" value="{{$customer->fax}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{$customer->email}}">
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" cols="30" rows="10" class="form-control">{!!$customer->address!!}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
