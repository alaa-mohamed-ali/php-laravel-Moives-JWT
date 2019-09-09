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


Route::post('user/register', 'APIRegisterController@register');

Route::get('user/login', 'APILoginController@login');


Route::middleware('jwt.auth')->get('/users', function (Request $request) {
    return auth()->user();
});


Route::middleware('jwt.auth')->group( function(){
    Route::post('add', 'API\MoivesController@store') ;
    Route::delete('delete/{id}', 'API\MoivesController@destroy') ;
    Route::put('edit/{id}', 'API\MoivesController@updates') ;
    Route::get('getall', 'API\MoivesController@index') ;
    Route::get('get/{id}', 'API\MoivesController@show') ;  
    Route::get('filter/{name}', 'API\MoivesController@filter') ;   
} );