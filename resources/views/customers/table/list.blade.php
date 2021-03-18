<table id="tb-customers" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Customer Code</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $key => $customer)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->code}}</td>
            <td>{{$customer->email}}</td>
            <td>
                <a href="{{route('customers.edit',['id' => $customer->id])}}" class="btn btn-sm btn-primary">Edit</a>
                <a href="{{route('customers.delete',['id' => $customer->id])}}" class="btn btn-sm btn-danger" onclick="drawTable()">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
