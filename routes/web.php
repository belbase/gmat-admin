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

Route::get('/','DefaultController@index')->name('home');
Route::post('/question/add', 'QuestionController@add')->name('question-add');
Route::post('/question/edit', 'QuestionController@edit')->name('question-edit');
Route::post('/question/delete','QuestionController@delete')->name('question-delete');

Route::get('/question/{name}', 'QuestionController@index')->name('question-index');
Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
