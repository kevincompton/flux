<?php

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


Route::get('/poa', 'SignatureController@sign');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', 'OnboardController@onboard');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::post('/user/update/', 'UserController@update');
Route::post('/user/poa/', 'UserController@poa');
Route::post('/budget/new', 'BudgetController@create');
Route::post('/plan/plus', 'BudgetController@plus');
Route::post('/plan/prime', 'BudgetController@prime');
Route::post('/creditor/new', 'CreditorController@create');

