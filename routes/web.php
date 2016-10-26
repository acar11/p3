<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'P3Controller@index')->name('p3s.index'); #
Route::get('lorem', 'P3Controller@create')->name('lorems.create'); #
Route::get('user', 'P3Controller@profile')->name('users.profile'); #
Route::post('lorem_result', 'P3Controller@show_lorem_text')->name('lorem_results.show_lorem_text'); #
Route::post('show_users', 'P3Controller@show_users')->name('show_users.show_users'); #
