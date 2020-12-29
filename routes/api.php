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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vacancies/list', 'Api\ArticleController@api');
Route::get('/fetchapi', 'Api\ArticleController@fetchapi');
Route::get('/createapi', 'Api\ArticleController@create');
Route::group(['prefix' => '/users'], function () {
    Route::post('/login','Api\loginController@login');
    Route::middleware('auth:api')->get('/logout', 'Api\loginController@logout');
    Route::post('/signup','Api\loginController@signup');
    Route::get('signup/activate/{token}', 'Api\loginController@signupActivate');
   // Route::middleware('auth:api')->get('all','Api\user\UserController@index');
   Route::middleware('auth:api')->get('/all','Api\user\UserController@index');

});


Route::group(['prefix' => 'posts'], function() {
    Route::get('/', 'PostController@index')->name('posts');
    Route::get('/{post}', 'PostController@show')->name('posts.show');
    Route::post('/', 'PostController@store')->name('posts.store');
    Route::put('/{post}', 'PostController@update')->name('posts.update');
    Route::delete('/{post}', 'PostController@delete')->name('posts.delete');
});
