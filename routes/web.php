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

Route::get('/payment', 'UserController@payment');

Route::get('/poa', 'SignatureController@sign');

Route::get('manageMailChimp', 'MailChimpController@manageMailChimp');
Route::post('subscribe',['as'=>'subscribe','uses'=>'MailChimpController@subscribe']);
Route::post('sendCompaign',['as'=>'sendCompaign','uses'=>'MailChimpController@sendCompaign']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prime', 'UserController@prime');
Route::get('/flex', 'UserController@flex');
Route::get('/plus', 'UserController@plus');
Route::get('/cash', 'UserController@cash');
Route::get('/contact', 'UserController@contact');
Route::get('/contact/confirm', 'UserController@confirmMessage');
Route::post('/contact/send', 'UserController@sendMessage');

Route::get('/credit/apply', 'UserController@creditApplication');

Route::get('/signup', 'OnboardController@onboard');
Route::get('/poa-placeholder', 'HomeController@poaPlaceholder');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Auth::routes();

Route::post('/cosigner/new', 'UserController@cosign');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::post('/user/update/', 'UserController@update');
Route::post('/user/poa/', 'UserController@poa');
Route::post('/budget/new', 'BudgetController@create');
Route::post('/plan/plus', 'BudgetController@plus');
Route::post('/plan/prime', 'BudgetController@prime');
Route::post('/creditor/new', 'CreditorController@create');

