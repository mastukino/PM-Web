<?php

Route::group(['prefix' => 'salary-report','middleware' => 'can:admin'], function () {
    Route::get('/', 'SalaryReportController@index')->name('salary-report.index');
    Route::post('/paid-all-salary','SalaryReportController@paidAll')->name('salary-report.paid');
});
