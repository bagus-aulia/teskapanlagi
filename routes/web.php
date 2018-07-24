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

Route::get ('/',                         'BiodataController@index');
Route::post('/biodata/store',            'BiodataController@store');
Route::get ('/biodata/list.html',        'BiodataController@show');
Route::get ('/biodata/pesan.html',       'BiodataController@message');

Route::get ('/biodata/{namaFile}',       'BiodataController@edit');
Route::get ('/deletebiodata/{namaFile}', 'BiodataController@destroy');

// Route::group(['middleware' => ['web']], function (){
//     Route::resource('biodata', 'BiodataController');
// });

// Route::get ('/biodata/store.html',  function(){ return redirect('/'); });
