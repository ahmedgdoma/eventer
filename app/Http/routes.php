<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Mail;

Route::get('fake/speaker', function(){
    factory(App\Speaker::class, 50)->create();
});
Route::get('fake/user', function(){
    factory(App\User::class, 50)->create();
});


Route::group(['middleware'=>'auth'], function(){
	Route::get('/', 'HomeController@index');
	Route::get('/sendmails/{event_id}', 'userController@sendmails');
	Route::post('/sendtousers/', 'userController@sendtousers');
    Route::resource('/speakers', 'speakerController');
    Route::resource('/users', 'userController');
    Route::resource('/events', 'eventController');
    Route::resource('/sessions', 'sessionController');
    Route::resource('/materials', 'MaterialController');
    Route::resource('/chairs', 'ChairController');
    Route::resource('/questions', 'QuestionController');
    Route::get('/events/attendance/{id}', 'eventController@attendance');
    Route::get('/chairs/create/{num}/{event_id}', 'ChairController@create');
    Route::get('/addChairs/{id}', 'eventController@addChairs');
    Route::get('/download/{id}', 'MaterialController@download');
    Route::get('/addMaterialForEvent/{id}', 'MaterialController@addMaterialForEvent');
    Route::get('/addSessionForEvent/{event_id}', 'sessionController@addSessionForEvent');
    Route::get('/addQuestionForEvent/{event_id}', 'QuestionController@addQuestionForEvent');
});




Route::auth();

Route::get('/home', 'HomeController@index');
