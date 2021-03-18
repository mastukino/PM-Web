<?php

Route::group(['prefix' => 'customers','middleware' => 'can:admin'], function () {
    Route::get('/', 'CustomerController@index')->name('customers.index');
    Route::get('/create', 'CustomerController@create')->name('customers.create');
    Route::get('/edit/{id}', 'CustomerController@edit')->name('customers.edit');
    Route::get('/delete/{id}', 'CustomerController@destroy')->name('customers.delete');
    Route::post('/store', 'CustomerController@store')->name('customers.store');
    Route::put('/update/{id}', 'CustomerController@update')->name('customers.update');
});
