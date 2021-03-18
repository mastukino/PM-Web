<form action="{{route('users.update',['id' => $user->id])}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
