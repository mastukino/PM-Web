<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index')->with(['employees' => $employees]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(EmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->dob = $request->dob;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->position = $request->position;
        $employee->phone = $request->phone;
        $employee->initial = $request->initial;
        $employee->save();

        return redirect()->back()->withSuccess('Employee created sucessfully');

    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit')->with(['employee' => $employee]);
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->dob = $request->dob;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->position = $request->position;
        $employee->phone = $request->phone;
        $employee->initial = $request->initial;
        $employee->touch();

        return redirect()->back()->withSuccess('Employee updated sucessfully');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->back()->withSuccess('Employee deleted sucessfully');
    }
}
