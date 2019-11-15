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

Route::get('/patients',[
    'uses'=>'ApiController@getPatients'
]);
Route::get('/doctors',[
    'uses'=>'ApiController@getDoctors'
]);
Route::get('/categories',[
    'uses'=>'ApiController@getCategories'
]);
Route::post('/patient/new',[
    'uses'=>'ApiController@newPatient'
]);
Route::post('/doctor/new',[
    'uses'=>'ApiController@newDoctor',
]);
Route::post('/category/new',[
    'uses'=>'ApiController@newCategory'
]);

//http://192.168.100.101:8000/api/categories
//http://192.168.100.101:8000/api/doctors
//http://192.168.100.101:8000/api/patients