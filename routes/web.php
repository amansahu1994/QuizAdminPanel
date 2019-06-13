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


//Route::get('/', 'HomeController@home');

Route::get('/viewSubject', 'SubjectsController@viewSubjects');
Route::get('getSubjects', 'SubjectsController@getSubjects');
Route::get('getSubject', 'SubjectsController@getSubject');

Route::get('/viewChapter', 'ChaptersController@viewChapters');
Route::get('getChapters', 'ChaptersController@getChapters');
Route::get('getChapter', 'ChaptersController@getChapter');

//Route::get('/addQuestion', 'HomeController@addQuestions');

Route::post('addSubject', 'SubjectsController@addSubjects');
Route::post('deleteSubject','SubjectsController@deleteSubject');
Route::post('editSubject','SubjectsController@editSubject');

Route::post('addChapter', 'ChaptersController@addChapters');
Route::post('deleteChapter','ChaptersController@deleteChapter');
Route::post('editChapter','ChaptersController@editChapter');

Route::get('/viewQuestions', 'QuestionsController@getSubjectAndChapters');
Route::post('addQuestion', 'QuestionsController@addQuestion');
Route::get('getQuestion', 'QuestionsController@getQuestion');
Route::post('updateQuestion', 'QuestionsController@updateQuestion');
Route::post('deleteQuestion', 'QuestionsController@deleteQuestion');




Route::get('/', 'HomeController@index')->name('home');



Auth::routes();

Route::middleware(['auth'])->group (function () {

    Route::get('master', 'HomeController@index')->name('master');


});
