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

      $signature_request_id = $response["signature_request"]["signature_request_id"];
      $signatures = $response["signature_request"]["signatures"];

      $signature_id = $signatures[0]["signature_id"];

      $response = $this->getEmbeddedSignUrl($signature_id);

      $sign_url = $response["embedded"]["sign_url"];

      return View::make('documents.poa_form')->with('sign_url', $sign_url);
    }

    private function getEmbeddedSignUrl($signature_id)
    {

      $ch = curl_init('https://api.hellosign.com/v3/embedded/sign_url/' . $signature_id);

      $response = $this->curlRequest($ch, null);

      return $response;

    }

    private function curlRequest($ch, $data)
    {
      $apiKey = getenv('HELLOSIGN_API_KEY');

        curl_setopt($ch, CURLOPT_USERNAME, $apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        if($data != null) {
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch));
        }

        $response = json_decode(curl_exec($ch), true);

        if (array_key_exists('error', $response)) {
            throw new \Exception($response->error->error_msg);
        }

        curl_close($ch);

        return $response;
    }

    private function getEmbeddedSignatureRequest()
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

        $response = $this->curlRequest($ch, $data);

        return $response;
    }

}
