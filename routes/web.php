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
Route::post('hellosign-callback', function()
{
  // Get the json object sent by HelloSign.
  $data_input = Input::all();
  $data = json_decode($data_input['json']);
 
  // Get the event type.
  $event_type = $data->event->event_type;
 
  // The signature_request_all_signed event is called whenever the signature
  // request is completely signed by all signees, HelloSign has processed
  // the document and has it available for download.
  if ($event_type == 'signature_request_all_signed')
  {
    $client = new HelloSign\Client(getenv('HELLOSIGN_API_KEY'));
    // Here you define where the file should download to. This should be
    // customized to your app's needs.
    $file_path = "/tmp/{$signature_request_id}.pdf";
    $client->getFiles($signature_request_id, $file_path, 'pdf');
  }
 
  // Always be sure to return this response so that HelloSign knows
  // that your app processed the event successfully. Otherwise, HelloSign
  // will assume it failed and will retry a few more times.
  return "Hello API Event Received";
});

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

