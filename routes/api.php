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
Route::get('statserver', function () {
    return Response::json(['status' => 1, 'message' => 'Hello, Urip Ki']);
});
Route::get('getreview','API\Apiv1Controller@getreview');
Route::post('getreviewbyid','API\Apiv1Controller@getreviewbyid');
Route::post('insertreview','API\Apiv1Controller@insertreview');
Route::post('deletereview','API\Apiv1Controller@deletereview');
Route::post('updatereview','API\Apiv1Controller@updatereview');
