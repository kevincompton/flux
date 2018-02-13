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
Route::get('/privacy-policy', 'UserController@privacy');

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

// Dashboard Routes
Route::get('/dashboard', 'DashController@dashboard')->name('dashboard');
Route::get('/dashboard/cosigner', 'DashController@cosigner');
Route::get('/dashboard/creditors', 'DashController@creditors');
Route::get('/dashboard/credit', 'DashController@credit');
Route::get('/dashboard/credit-report', 'DashController@creditReport');
<<<<<<< HEAD
Route::get('/dashboard/refer', 'DashController@refer');
Route::get('/dashboard/credit-application/pdf', 'SignatureController@creditApply');

=======
Route::get('/dashboard/credit-application/pdf', 'DashController@renderPDF');
>>>>>>> master

  // Dashboard Actions
  Route::post('/dashboard/onboard', 'DashController@onboardUpdate');
  Route::get('/dashboard/onboard/step', 'DashController@onboardStep');
  Route::post('/dashboard/refer/invite', 'DashController@inviteUser');

Route::post('/user/update/', 'UserController@update');
Route::post('/user/poa/', 'UserController@poa');
Route::post('/budget/new', 'BudgetController@create');
Route::post('/plan/plus', 'BudgetController@plus');
Route::post('/plan/prime', 'BudgetController@prime');
Route::post('/creditor/new', 'CreditorController@create');
Route::post('/credit-report/upload', 'DashController@uploadCreditReport');
Route::post('/credit/apply', 'DashController@creditApply');

// Admin Routes
Route::get('/dashboard/admin', 'AdminController@index')->middleware('admin');
Route::get('/dashboard/admin/cosigners', 'AdminController@cosigners')->middleware('admin');
Route::get('/dashboard/admin/creditors', 'AdminController@creditors')->middleware('admin');
Route::get('/dashboard/admin/budget/{budget}', 'AdminController@showBudget')->middleware('admin');
Route::get('/dashboard/admin/user/{user}/delete', 'AdminController@deleteUser')->middleware('admin');
Route::get('/dashboard/admin/user/{user}/poa/complete', 'AdminController@poaComplete')->middleware('admin');
Route::get('/dashboard/admin/user/{user}/poa/incomplete', 'AdminController@poaInomplete')->middleware('admin');