<?php

use Illuminate\Support\Facades\Input;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
