<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/experience/create', 'ExperienceController@store');
Route::get('/experience/edit/{id}', 'ExperienceController@edit');
Route::post('/experience/update/{id}', 'ExperienceController@update');
Route::delete('/experience/delete/{id}', 'ExperienceController@delete');
Route::get('/experiences', 'ExperienceController@index');

Route::post('/education/create', 'EducationController@store');
Route::get('/education/edit/{id}', 'EducationController@edit');
Route::post('/education/update/{id}', 'EducationController@update');
Route::delete('/education/delete/{id}', 'EducationController@delete');
Route::get('/educations', 'EducationController@index');

Route::post('/contact', 'ContactController@store');