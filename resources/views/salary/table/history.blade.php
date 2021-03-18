<table id="tb-salary-history" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Employee Name</th>
            <th>Total Presences / 30 days</th>
            <th>Base Salary</th>
            <th>Nett Salary (Working day * salary/day)</th>
            <th>Paid At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employeeHistory as $key => $eh)
        <tr>
            <td>
                {{++$key}}
            </td>
            <td>
                {{$eh->employee->employee->name}}
            </td>
            <td>
                {{$eh->working_hour}} days
            </td>
            <td>
                Rp {{number_format($eh->base_salary,0)}}
            </td>
            <td>
                Rp {{number_format($eh->nett_salary,0)}}
            </td>
            <td>
                {{$eh->paid_at}}
            </td>
            <td>
                <button class="btn btn-sm btn-success">Print Salary Slip</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
