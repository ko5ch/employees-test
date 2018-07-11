<?php

use Illuminate\Support\Facades\Input;

Route::get('/', function(){
    return view('home');
});
Route::get('/home', function(){
    return view('home');
});


Route::any('employees/list', 'EmployeesController@getList')->middleware('auth');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('employees','EmployeesController');
});

//Route::get('people/create', function () {
//// Create person...
//})->middleware('can:create-person');
//Route::get('people/{person}/edit', function () {
//// Create person...
//})->middleware('can:create,person');

/*
-порядок тут+ порядок во views, view на екшн, формы _view
*/