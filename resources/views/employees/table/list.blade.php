<table id="tb-employees" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $key => $employee)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->phone}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->position}}</td>
            <td>
                <a href="{{route('employees.edit',['id' => $employee->id])}}" class="btn btn-sm btn-primary">Edit</a>
                <a href="{{route('employees.delete',['id' => $employee->id])}}" class="btn btn-sm btn-danger" onclick="drawTable()">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
