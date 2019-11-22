<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function() {
    Route::apiResource('/questions', 'Api\QuestionsController')->except('index');	    Route::apiResource('/questions', 'Api\QuestionsController')->except('index');
    Route::apiResource('/questions.answers', 'Api\AnswersController')->except('index');
});

Route::post('/token', 'Auth\LoginController@getToken');

Route::get('/questions', 'Api\QuestionsController@index');
