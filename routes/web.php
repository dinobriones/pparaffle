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
Route::get('/upload', 'HomeController@uploads')->name('uploads');
Route::get('/draw', 'HomeController@draw')->name('draw');
Route::post('/drawwinners', 'HomeController@drawwinners')->name('drawwinners');
Route::get('/listwinners', 'HomeController@list')->name('listwinners');

Route::post('/uploadcsv',[
    'uses' => 'HomeController@uploadcsv',
    'as' => 'uploadcsv.uploadcsv'
    ]);