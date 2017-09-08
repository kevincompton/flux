<?php

namespace App\Http\Controllers;

use Auth;
use HelloSign;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    
    public function callback()
    {
      return "success";
    }

    public function sign()
    {
      

      $response = $this->getEmbeddedSignatureRequest();

      $signature_request_id = $response["signature_request_id"];

      return $signature_request_id;

      $signatures = $response->getSignatures();

      $signature_id = $signatures[0]->getId();

      $response = $client->getEmbeddedSignUrl($signature_id);
      $sign_url = $response->getSignUrl();

      $response = $this->client->getSignatureRequests();
      print_r($response->getWarnings());

      return View::make('documents.poa')->with('sign_url', $sign_url);
    }

    public static function getEmbeddedSignatureRequest()
    {
      $user = Auth::user();

        $data = [
            'client_id' => getenv('HELLOSIGN_CLIENT_KEY'),
            'template_id' => getenv('HELLOSIGN_TEMPLATE_ID'),
            'subject' => 'Subject',
            'message' => '',
            'signers' => [
                'Client' => [
                    'email_address' => $user->email,
                    'name' => $user->name
                ]
            ]
        ];

        if (getenv('HELLOSIGN_TEST_MODE') == 1) {
            $data['test_mode'] = 1;
        }

        $ch = curl_init('https://api.hellosign.com/v3/signature_request/create_embedded_with_template');

        $apiKey = getenv('HELLOSIGN_API_KEY');

        curl_setopt($ch, CURLOPT_USERNAME, $apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch));
        }

        $response = json_decode(curl_exec($ch));

        if (array_key_exists('error', $response)) {
            throw new \Exception($response->error->error_msg);
        }

        curl_close($ch);

        return $response;
    }

}
