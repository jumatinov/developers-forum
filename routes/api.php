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

Route::post('/login', 'Auth\LoginController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'users' => 'UserController',
    'tags' => 'TagController',
    'answers' => 'AnswerController',
    'questions' => 'QuestionController',
    'answer-likes' => 'AnswerLikeController',
]);

Route::get('/me', 'UserController@me');
Route::get('/user/questions', 'UserController@userQuestions');