<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\EmployeeProject;
use App\Models\Project;
use App\Models\ProjectWorkload;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    protected $customers;
    protected $employees;

    public function __construct()
    {
        $this->customers = Customer::all();
        $this->employees = Employee::all();
    }

    public function index()
    {
        $projects = Project::query();
        if(Auth::user()->role == "employee")
        {
            $projects->whereHas('employees', function($q){
                $q->where('employee_id',Auth::user()->employee_id);
            });
        }
        return view('projects.index')->with(['projects' => $projects->get()]);
    }

    public function create()
    {

        return view('projects.create')->with(['customers' => $this->customers, 'employees' => $this->employees]);
    }

    public function store(ProjectRequest $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->customer_id = $request->customer_id;
        $project->rate_hour = $request->rate_hour;
        $project->description = $request->description;
        $project->save();

        foreach($request->employees as $item)
        {
            EmployeeProject::create(
                [
                    'employee_id' => $item,
                    'project_id' => $project->id,
                ]
            );
        }

        return redirect()->back()->withSuccess('Project created sucessfully');

    }

    public function edit($id)
    {
        $project = Project::find($id);
        $assigned_employee = EmployeeProject::where('project_id',$id)->get();
        return view('projects.edit')->with(['project' => $project, 'customers' => $this->customers, 'employees' => $this->employees, 'assigned_employee' => $assigned_employee ]);
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        $project->customer_id = $request->customer_id;
        $project->rate_hour = $request->rate_hour;
        $project->description = $request->description;
        $project->touch();

        foreach($request->employees as $item)
        {
            EmployeeProject::updateOrCreate(
                [
                    'employee_id' => $item,
                    'project_id' => $project->id,
                ],
                [
                    'employee_id' => $item,
                    'project_id' => $project->id,
                ]
            );
        }

        return redirect()->back()->withSuccess('Project updated sucessfully');
    }

    public function destroy($id)
    {
        //
    }

    public function workload($id)
    {
        $project = Project::find($id);
        return view('projects.workload')->with(['project' => $project]);
    }

    public function saveWorkload(Request $request)
    {
        if($request->ajax())
        {
            $pw = new ProjectWorkload();
            $pw->user_id = Auth::id();
            $pw->project_id = $request->project_id;
            $pw->start_time = Carbon::now();
            $pw->save();

            return response()->json(['message' => 'New work has been added'], 200);
        }
    }

    public function stopWorkload(Request $request)
    {
        if($request->ajax())
        {
            $pw = ProjectWorkload::find($request->workload_id);
            $pw->status = 1;
            $pw->end_time = Carbon::now();
            $pw->save();

            return response()->json(['message' => 'Workload has been stopped'], 200);
        }
    }
}
