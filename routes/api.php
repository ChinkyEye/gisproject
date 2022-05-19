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
// notice route
Route::put('/notice','SuperAdmin\ApiController@api');
Route::get('/notice','SuperAdmin\ApiController@apidelete');
Route::get('/notice/active','SuperAdmin\ApiController@apiActive');
Route::put('/notice/update','SuperAdmin\ApiController@apiUpdate');
// document
Route::put('/document','SuperAdmin\ApiController@documentapi');
Route::get('/document','SuperAdmin\ApiController@documentapidelete');
Route::get('/document/active','SuperAdmin\ApiController@documentapiActive');
Route::put('/document/update','SuperAdmin\ApiController@documentapiUpdate');
// document
Route::put('/report','SuperAdmin\ApiController@reportapi');
Route::get('/report','SuperAdmin\ApiController@reportapidelete');
Route::get('/report/active','SuperAdmin\ApiController@reportapiActive');
Route::put('/report/update','SuperAdmin\ApiController@reportapiUpdate');
// core-persion
Route::put('/coreperson','SuperAdmin\ApiController@corepersionapi');
Route::get('/coreperson','SuperAdmin\ApiController@corepersionapidelete');
Route::get('/coreperson/active','SuperAdmin\ApiController@corepersionapiActive');
Route::put('/coreperson/update','SuperAdmin\ApiController@corepersionapiUpdate');
