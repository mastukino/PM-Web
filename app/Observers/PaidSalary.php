<?php

namespace App\Observers;

use App\Models\EmployeePaidSalary;
use Illuminate\Support\Facades\DB;

class PaidSalary
{
    /**
     * Handle the employee paid salary "created" event.
     *
     * @param  \App\=Models\EmployeePaidSalary  $employeePaidSalary
     * @return void
     */
    public function created(EmployeePaidSalary $employeePaidSalary)
    {
        DB::table('employee_presence')->where('user_id', $employeePaidSalary->user_id )->update(['remark' => 'paid']);
    }

    /**
     * Handle the employee paid salary "updated" event.
     *
     * @param  \App\=Models\EmployeePaidSalary  $employeePaidSalary
     * @return void
     */
    public function updated(EmployeePaidSalary $employeePaidSalary)
    {
        //
    }

    /**
     * Handle the employee paid salary "deleted" event.
     *
     * @param  \App\=Models\EmployeePaidSalary  $employeePaidSalary
     * @return void
     */
    public function deleted(EmployeePaidSalary $employeePaidSalary)
    {
        //
    }

    /**
     * Handle the employee paid salary "restored" event.
     *
     * @param  \App\=Models\EmployeePaidSalary  $employeePaidSalary
     * @return void
     */
    public function restored(EmployeePaidSalary $employeePaidSalary)
    {
        //
    }

    /**
     * Handle the employee paid salary "force deleted" event.
     *
     * @param  \App\=Models\EmployeePaidSalary  $employeePaidSalary
     * @return void
     */
    public function forceDeleted(EmployeePaidSalary $employeePaidSalary)
    {
        //
    }
}
