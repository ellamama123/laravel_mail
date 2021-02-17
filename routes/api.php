<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$namespace = '\App\Http\Controllers';
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
Route::group(['namespace' => $namespace], function(){
    Route::apiResource('candidate','CandidateController');
    Route::apiResource('template', 'TemplateController');
    Route::apiResource('history', 'HistoryController');
    Route::post('login', 'LoginController@login');
});

Route::get('getMailThank', 'TemplateController@getTemplateThankApi');
Route::get('getMailIntern', 'TemplateController@getTemplateInternApi');
Route::get('getMailOffer', 'TemplateController@getTemplateOfferApi'); 
Route::post('send-mail','MailThankController@sendMail');
Route::post('send-mailIntern', 'MailInternController@sendMail');
Route::post('send-mailOffer', 'MailOfferController@sendMail');