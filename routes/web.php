<?php

Auth::routes();

Route::get('/', 'CustomerController@index')->name('dashboard');
Route::get('/home', 'HomeController@index')->name('home');

//--- Customer CRUD functionality ---//
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/customers/create', 'CustomerController@createCustomerForm');
Route::get('/customers/edit/{id}', 'CustomerController@edit');
Route::get('/customers/show/{id}', 'CustomerController@show');
Route::get('/customers/delete/{id}', 'CustomerController@destroy');
Route::post('/customers/add', 'CustomerController@store');
Route::post('/customers/update/{id}', 'CustomerController@update');

//--- Add and Remove notes ---//
Route::get('/note/create', 'NoteController@create');
Route::post('/note/store/{customer_id}', 'NoteController@store');

Route::get('/send-email/{customer_id}', 'EmailController@send');