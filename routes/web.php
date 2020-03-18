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

Route::get('/', 'SpaceParkController@index');

/** 
* Route group of space_parks
*/
Route::group(['prefix'=>'test'], function(){

	// Route list space park
	Route::get('/index', 'SpaceParkController@index')->name('list-space-park');

	// Route create space park
	Route::get('/create', 'SpaceParkController@create')->name('create-space-park');

	// Route call edit function space park
	Route::get('/edit/{id}', 'SpaceParkController@edit')->name('edit-space-park');

	// Route store space park
	Route::post('/save', 'SpaceParkController@store')->name('save-space-park');

	// Route call update a space park
	Route::put('/update/{id}', 'SpaceParkController@update')->name('update-space-park');

	// Route call delete space park that chossen
	Route::delete('/delete/{id}', 'SpaceParkController@destroy')->name('delete-space-park');
});

