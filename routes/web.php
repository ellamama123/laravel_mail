<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$namespace = '\App\Http\Controllers';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mail/mailThank','TemplateController@getTemplateThank');
Route::get('/mail/mailIntern','TemplateController@getTemplateIntern');
Route::get('/mail/mailOffer','TemplateController@getTemplateOffer');
