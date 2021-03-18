<?php

Route::group(['prefix' => 'projects'], function () {
    Route::group(['middleware' => 'can:admin'], function () {
        Route::get('/create', 'ProjectController@create')->name('projects.create');
        Route::get('/edit/{id}', 'ProjectController@edit')->name('projects.edit');
        Route::get('/delete/{id}', 'ProjectController@destroy')->name('projects.delete');
        Route::post('/store', 'ProjectController@store')->name('projects.store');
        Route::put('/update/{id}', 'ProjectController@update')->name('projects.update');
    });
    Route::get('/', 'ProjectController@index')->name('projects.index');
    Route::get('/workload/{id}','ProjectController@workload')->name('projects.workload');
    Route::post('/workload/store','ProjectController@saveWorkload')->name('projects.add.workload');
    Route::post('/workload/stop','ProjectController@stopWorkload')->name('projects.stop.workload');
});
