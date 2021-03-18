<table id="tb-salary" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Employee Name</th>
            <th>Total Presences / 30 days</th>
            <th>Base Salary</th>
            <th>Nett Salary (Working day * salary/day)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employeePresence as $key => $ep)
        <tr>
            <td>
                <input type="checkbox" name="user[]" value="{{$ep[0]->user->id}}">
            </td>
            <td>{{$ep[0]->user->employee->name}}</td>
            <td>
                <?php $days = 0; $hours = 0; ?>
                @foreach($ep as $item)
                    @if($item->check_out != null)
                    @php
                    $startTime = \Illuminate\Support\Carbon::parse($item->check_in);
                    $endTime = \Illuminate\Support\Carbon::parse($item->check_out);
                    $time = $endTime->diff($startTime,true);
                    $hours = ($hours + $time->h);
                    $days = $hours/8
                    @endphp
                    @endif
                @endforeach
                {{$days}} day(s)
                <input type="hidden" name="working_day[]" value="{{$days}}">
            </td>
            <td>
                <?php $salaryMonth = $ep[0]->user->employee->salary ?>
                Rp {{number_format($salaryMonth,0)}} ||
                <?php $salaryDay = $ep[0]->user->employee->salary/30; ?>
                Rp {{number_format($salaryDay,0)}} /Day
                <input type="hidden" name="base_salary[]" value="{{$salaryMonth}}">
            </td>
            <td>
                <?php $nettSalary = $salaryDay*$days; ?>
                Rp {{number_format($nettSalary,0)}}
                <input type="hidden" name="nett_salary[]" value="{{$nettSalary}}">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
