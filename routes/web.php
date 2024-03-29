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


Route::get('/questions', 'QuestionController@index');

Route::get('/questions/1', 'QuestionController@show');
Route::get('/answers/1', 'AnswerController@show');
Route::post('/answers/1', 'AnswerController@vote');
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
