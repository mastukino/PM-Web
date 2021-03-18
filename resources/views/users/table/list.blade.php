<table id="tb-users" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>
                <a href="{{route('users.edit',['id' => $user->id])}}" class="btn btn-sm btn-primary">Edit</a>
                <a href="{{route('users.delete',['id' => $user->id])}}" class="btn btn-sm btn-danger" onclick="drawTable()">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
