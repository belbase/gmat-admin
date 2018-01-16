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
Route::post('/question/store', 'QuestionController@store')->name('question-store');
Route::post('/question/update', 'QuestionController@update')->name('question-update');
Route::post('/question/delete','QuestionController@delete')->name('question-delete');
Route::post('/upload/image','ResourceController@uploadImages')->name('image-upload');
Route::get('/browse/image','ResourceController@browseImages')->name('image-browse');

Route::get('/question/{name}', 'QuestionController@index')->name('question-index');
Route::get('/review/aw', 'ReviewController@index')->name('review-index');
Route::post('/review/change', 'ReviewController@change')->name('review-change');

Auth::routes();

Route::post('/upload_image', function() {
    $CKEditor = Input::get('CKEditor');
    $funcNum = Input::get('CKEditorFuncNum');
    $message = $url = '';
    if (Input::hasFile('upload')) {
        $file = Input::file('upload');
        if ($file->isValid()) {
            $filename = $file->getClientOriginalName();
            $file->move(storage_path().'/images/', $filename);
            $url = public_path() .'/images/' . $filename;
        } else {
            $message = 'An error occured while uploading the file.';
        }
    } else {
        $message = 'No file uploaded.';
    }
    return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
});
// Route::get('/home', 'HomeController@index')->name('home');
