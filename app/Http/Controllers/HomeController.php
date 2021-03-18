<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeProject;
use App\Models\Invoice;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::get()->count();
        $projects = Project::get()->count();
        $unpaid = Invoice::where('paid',0)->get()->sum('grand_total');
        $sales = Invoice::where('paid',1)->get()->sum('grand_total');

        $assignedProject = EmployeeProject::where('employee_id',Auth::user()->employee_id)->count();

        return view('home')->with([
            'employees' => $employees,
            'projects' => $projects,
            'unpaid' => $unpaid,
            'sales' => $sales,
            'assigned' => $assignedProject,
        ]);
    }
}
