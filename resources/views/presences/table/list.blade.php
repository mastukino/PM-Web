<table id="tb-absences" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Check In</th>
            <th>Check Out</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->user->employee->name}}</td>
            <td>{{$item->check_in}}</td>
            <td>{{$item->check_out}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
