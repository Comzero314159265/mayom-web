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
Route::domain('{project}.localhost')->group(function () {
    Route::get('/', 'ProjectManagementController@index');

    Route::get('/team', function () {
        return "team";
    });
    Route::get('/member', function () {
        return "team";
    });
});

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/project', 'ProjectController@index')->name('project');

