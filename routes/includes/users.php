<?php

Route::group(['prefix' => 'users','middleware' => 'can:admin'], function () {
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/create', 'UserController@create')->name('users.create');
    Route::get('/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::get('/delete/{id}', 'UserController@destroy')->name('users.delete');
    Route::post('/store', 'UserController@store')->name('users.store');
    Route::put('/update/{id}', 'UserController@update')->name('users.update');
});

