<?php

Route::group(['prefix' => 'employees','middleware' => 'can:admin'], function () {
    Route::get('/', 'EmployeeController@index')->name('employees.index');
    Route::get('/create', 'EmployeeController@create')->name('employees.create');
    Route::get('/edit/{id}', 'EmployeeController@edit')->name('employees.edit');
    Route::get('/delete/{id}', 'EmployeeController@destroy')->name('employees.delete');
    Route::post('/store', 'EmployeeController@store')->name('employees.store');
    Route::put('/update/{id}', 'EmployeeController@update')->name('employees.update');
});
