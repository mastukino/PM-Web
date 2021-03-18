<?php

namespace App\Http\Controllers;

use App\Models\EmployeePaidSalary;
use App\Models\EmployeePresence;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SalaryReportController extends Controller
{
    public function index()
    {
        $current_month = date('m');
        $employeePresence = EmployeePresence::whereMonth('check_in',$current_month)
                            ->with(['user','user.employee'])
                            ->where('remark',NULL)
                            ->get()
                            ->groupBy('user_id');
        $employeeHistory = EmployeePaidSalary::orderBy('id','desc')->get();
        return view('salary.index')->with(['employeePresence' => $employeePresence, 'employeeHistory' => $employeeHistory]);
    }

    public function paidAll(Request $request)
    {
        if(count((array)$request->user) < 1)
        {
            return redirect()->back()->withErrors(['error' => 'Please select at least 1 employee']);
        }

        foreach($request->user as $key => $item)
        {
            EmployeePaidSalary::create([
                'user_id' => $item,
                'working_hour' => $request->working_day[$key],
                'base_salary' => $request->base_salary[$key],
                'nett_salary' => $request->nett_salary[$key],
                'paid_at' => Carbon::now(),
                'issued_by' => Auth::id(),
            ]);
        }

        return redirect()->back()->withSuccess('Selected employee have been paid');

    }
}
