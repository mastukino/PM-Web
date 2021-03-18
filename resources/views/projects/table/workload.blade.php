<table id="tb-workload" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Employee</th>
            <th>Start Date/time</th>
            <th>Interval</th>
            <th>End Date/time</th>
            <th>Assigned Employees</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $data = $project->workloads()->orderBy('id','DESC');
        if(\Auth::user()->role == "employee")
        {
        $data->where('user_id',\Auth::id());
        }
        @endphp
        @foreach ($data->get() as $key => $item)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->user->name}}</td>
            <td>{{$item->start_time}}</td>
            <td>
                @if($item->end_time != null)
                @php
                $startTime = \Illuminate\Support\Carbon::parse($item->start_time);
                $endTime = \Illuminate\Support\Carbon::parse($item->end_time);
                $time = $endTime->diff($startTime,true);

                echo $time->d." day(s) <br>".$time->h." hour(s) <br>".$time->i." min(s)";
                @endphp
                @else
                -
                @endif
            </td>
            <td>{{$item->end_time}}</td>
            <td>
                @foreach ($project->employees as $employee)
                {{$employee->employee->initial}},
                @endforeach
            </td>
            <td>
                @if($item->status == 0)
                Running
                @else
                Completed
                @endif
            </td>
            <td>
                <input type="hidden" name="workload_id" value="{{$item->id}}">
                @can('employee')
                <button type="button" @if($item->status == 1) disabled @endif class="btn btn-sm btn-danger"
                    name="btn_stop">Stop</button>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
