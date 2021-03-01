<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('takeSurveys',TakeSurveyController::class)->only([
    'store','show','index'
]);

Route::get('/survey/{id}/answers','SurveyController@showAllAttendees')->name('surveys.attendees')->middleware(['auth']);
Route::get('/survey/answer/{id}','SurveyController@showAnswer')->name('surveys.answer')->middleware(['auth']);
Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);
Route::resource('surveys', SurveyController::class)->except([
    'index'
])->middleware(['auth']);
Route::resource('questions',QuestionController::class)->except([
    'index'
])->middleware(['auth']);
Route::resource('options',OptionController::class)->only([
    'store','update','edit','destroy'
])->middleware(['auth']);


