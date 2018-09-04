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

Route::get('/companies', 'CompanyController@index')->name('companies');
Route::get('/add_company', 'CompanyController@create')->name('add_company');
Route::post('/company_submit', 'CompanyController@store')->name('company_submit');
Route::get('/company_edit/{id}', 'CompanyController@edit')->name('company_edit');
Route::get('/company_delete/{id}', 'CompanyController@delete')->name('company_delete');


Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/add_employee', 'EmployeeController@create')->name('add_employee');
Route::post('/employee_submit', 'EmployeeController@store')->name('employee_submit');
Route::get('/employee_edit/{id}', 'EmployeeController@edit')->name('employee_edit');
Route::get('/employee_delete/{id}', 'EmployeeController@delete')->name('employee_delete');



Route::get('storage/{filename}', function ($filename)
{

    $path = storage_path('public/images/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});