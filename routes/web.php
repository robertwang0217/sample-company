<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

	//routes for companies
    Route::get('company/report', [
        'as' => 'company.report', 'uses' => 'CompanyController@report',
    ]);

    Route::get('company/edit/{id}', [
        'as' => 'company.edit', 'uses' => 'CompanyController@edit',
    ]);

    Route::post('company/store', [
        'as' => 'company.store', 'uses' => 'CompanyController@store',
    ]);

    Route::post('company/update/{id}', [
        'as' => 'company.update', 'uses' => 'CompanyController@update',
    ]);

    Route::get('company/delete/{id}', [
        'as' => 'company.delete', 'uses' => 'CompanyController@delete',
    ]);


    //routes for employees
    Route::get('employee/report', [
        'as' => 'employee.report', 'uses' => 'EmployeeController@report',
    ]);

    Route::get('employee/edit/{id}', [
        'as' => 'employee.edit', 'uses' => 'EmployeeController@edit',
    ]);

    Route::post('employee/store', [
        'as' => 'employee.store', 'uses' => 'EmployeeController@store',
    ]);

    Route::post('employee/update/{id}', [
        'as' => 'employee.update', 'uses' => 'EmployeeController@update',
    ]);

    Route::get('employee/delete/{id}', [
        'as' => 'employee.delete', 'uses' => 'EmployeeController@delete',
    ]);

 });
