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
    $quizzes = \App\Quiz::all();
    return view('welcome', compact('quizzes'));
});

Route::post('/rooms', 'RoomController@store')->name('room.create');
Route::post('/rooms/{joinCode}', 'RoomController@join')->name('room.join');