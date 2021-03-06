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


Route::group(['prefix' => 'admin-dashboard-styanveshi'], function(){
    Auth::routes();
    Route::get('new', 'HomeController@newPost')->name('new-post');
    Route::post('new', 'PostController@create')->name('save-post');
    Route::get('edit-post', 'HomeController@allPost')->name('allPost');
    Route::get('edit/{id}', 'HomeController@singlePost')->name('singlePost');
    Route::post('edit/{id}', 'HomeController@edit')->name('editPost');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::any('{query}',
    function() { return redirect('/'); })
    ->where('query', '.*');
