<?php

namespace App\Observers;

use App\Models\Employee;
use App\User;
use Illuminate\Support\Facades\Hash;

class EmployeeObserver
{
    /**
     * Handle the employee "created" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function created(Employee $employee)
    {
        //Create account for employee
        $user = new User();
        $user->name = $employee->name;
        $user->email = $employee->email;
        $user->password = Hash::make($employee->email."_".$employee->initial);
        $user->employee_id = $employee->id;
        $user->role = "employee";
        $user->save();
    }

    /**
     * Handle the employee "updated" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "deleted" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "restored" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "force deleted" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        //
    }
}
