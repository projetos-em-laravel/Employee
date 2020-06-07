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
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('/game', 'GameController');
    Route::post('/game/{id}', 'GameController@destroy');
    Route::post('/screenshot/{game_id}', 'ScreenshotController@store')->name('screenshot.store');
    Route::put('/screenshot/{id}', 'ScreenshotController@update')->name('screenshot.update');
    Route::delete('/screenshot/{id}', 'ScreenshotController@destroy')->name('screenshot.destroy');
});

