<?php

Route::group(['prefix' => 'presences'], function () {
    Route::get('/', 'AttendanceController@index')->name('presences.index');
    Route::get('/delete/{id}', 'AttendanceController@destroy')->name('presences.delete');
    Route::post('/store', 'AttendanceController@store')->name('presences.store');
    Route::put('/update/{id}', 'AttendanceController@update')->name('presences.update');
});
