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

Route::get('/{quiz}', function ($quiz) {
    $quiz = App\Quiz::findByJoinCodeOrFail($quiz);
    return view('quiz.show', compact('quiz'));
});

Route::post('/{quiz}/join', function($quiz) {
    $quiz = App\Quiz::findByJoinCodeOrFail($quiz);
    event(new \App\Events\UserJoinedQuiz(request('username'), $quiz));
});
