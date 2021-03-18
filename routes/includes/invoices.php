<?php

Route::group(['prefix' => 'invoices','middleware' => 'can:admin'], function () {
    Route::get('/', 'InvoiceController@index')->name('invoices.index');
    Route::get('/create', 'InvoiceController@create')->name('invoices.create');
    Route::get('/edit/{id}', 'InvoiceController@edit')->name('invoices.edit');
    Route::get('/delete/{id}', 'InvoiceController@destroy')->name('invoices.delete');
    Route::post('/store', 'InvoiceController@store')->name('invoices.store');

    Route::put('/mark-as-paid/{id}', 'InvoiceController@markAsPaid')->name('invoices.mark.as.paid');

    Route::get('print/{id}','InvoiceController@print')->name('invoices.print');
});
