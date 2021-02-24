<?php

use App\Http\Controllers\AuthController;
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

   
    Route::post('/refresh', 'AuthController@refresh');
    Route::get('/user-profile', 'AuthController@userProfile');

    return $request->user();
});

Route::group(['namespace' => $namespace,  ], function(){
    Route::apiResource('candidate','CandidateController');
    Route::apiResource('template', 'TemplateController');
    Route::apiResource('history', 'HistoryController');

    //Registor
    Route::post('/register', 'AuthController@register');
    Route::post('/user', 'AuthController@user');
    //login
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
    Route::get('/user','AuthController@user');

}); 

Route::get('getMailThank', 'TemplateController@getTemplateThankApi');
Route::get('getMailIntern', 'TemplateController@getTemplateInternApi');
Route::get('getMailOffer', 'TemplateController@getTemplateOfferApi'); 
Route::post('send-mail','MailThankController@sendMail');
Route::post('send-mailIntern', 'MailInternController@sendMail');
Route::post('send-mailOffer', 'MailOfferController@sendMail');

Route::get('previewMail' , 'TemplateController@previewMail');


