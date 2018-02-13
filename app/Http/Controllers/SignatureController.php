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

    public function creditApply()
    {
      $user = Auth::user();

      if(env('APP_VERSION') != 'production' || env('APP_VERSION') != 'staging' ) {
        return redirect('/dashboard');
      }
      $response = $this->getEmbeddedSignatureRequest(getenv('HELLOSIGN_CREDIT_TEMPLATE_ID'));

      $signature_request_id = $response["signature_request"]["signature_request_id"];
      $signatures = $response["signature_request"]["signatures"];

      $signature_id = $signatures[0]["signature_id"];

      $response = $this->getEmbeddedSignUrl($signature_id);

      $sign_url = $response["embedded"]["sign_url"];

      $data = [
        "user" => $user,
        "sign_url" => $sign_url
      ];

      return view('documents.credit_form')->with($data);
    }

    public function sign()
    {
      $user = Auth::user();

      if(env('APP_VERSION') != 'production' || env('APP_VERSION') != 'staging' ) {
        return redirect('/dashboard');
      }
      $response = $this->getEmbeddedSignatureRequest(getenv('HELLOSIGN_TEMPLATE_ID'));

      $signature_request_id = $response["signature_request"]["signature_request_id"];
      $signatures = $response["signature_request"]["signatures"];

      $signature_id = $signatures[0]["signature_id"];

      $response = $this->getEmbeddedSignUrl($signature_id);

      $sign_url = $response["embedded"]["sign_url"];

      $data = [
        "user" => $user,
        "sign_url" => $sign_url
      ];

      return view('documents.poa_form')->with($data);
    }

    private function getDocument()
    {
      $dest_file_path = storage_path();
      $client->getFiles('fa5c8a0b0f492d768749333ad6fcc214c111e967', $dest_file_path, HelloSign\SignatureRequest::FILE_TYPE_ZIP);
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

       /* if (array_key_exists('error', $response)) {
            throw new \Exception($response->error->error_msg);
        }
      */
        curl_close($ch);

        return $response;
    }

    private function getEmbeddedSignatureRequest($template_id)
    {
      $user = Auth::user();
      $ssn = preg_replace ('/^(\d{3})(\d{2})(\d{4})$/', '$1-$2-$3', $user->ssn);

        $data = [
            'client_id' => getenv('HELLOSIGN_CLIENT_KEY'),
            'template_id' => $template_id,
            'subject' => 'Subject',
            'message' => '',
            'signers' => [
                'Client' => [
                    'email_address' => $user->email,
                    'name' => $user->name
                ]
            ],
            'custom_fields' => json_encode([
              [
                'name' => 'customer_name',
                'value' => $user->name
              ],
              [
                'name' => 'customer_name2',
                'value' => $user->name
              ],
              [
                'name' => 'ssn',
                'value' => $ssn
              ],
              [
                'name' => 'dob',
                'value' => $user->dob
              ],
              [
                'name' => 'address',
                'value' => $user->address
              ],
              [
                'name' => 'city',
                'value' => $user->city
              ],
              [
                'name' => 'state',
                'value' => $user->state
              ],
              [
                'name' => 'zip',
                'value' => $user->zip
              ]
            ])
        ];

        if (getenv('HELLOSIGN_TEST_MODE') == 1) {
            $data['test_mode'] = 1;
        } else {
          $data['test_mode'] = 0;
        }

        $ch = curl_init('https://api.hellosign.com/v3/signature_request/create_embedded_with_template');

        $response = $this->curlRequest($ch, $data);

        return $response;
    }

}
