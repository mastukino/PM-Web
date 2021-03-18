<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Employee;
use App\Models\EmployeePaidSalary;
use App\Observers\EmployeeObserver;
use App\Observers\PaidSalary;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Asia/Jakarta');
        Employee::observe(EmployeeObserver::class);
        EmployeePaidSalary::observe(PaidSalary::class);
    }
}
