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

      if(env('APP_VERSION') != 'production' && env('APP_VERSION') != 'staging' ) {
        return redirect('/dashboard');
      }
      $response = $this->getEmbeddedCreditSignatureRequest(getenv('HELLOSIGN_CREDIT_TEMPLATE_ID'));

      $signature_request_id = $response["signature_request"]["signature_request_id"];
      $signatures = $response["signature_request"]["signatures"];

      $signature_id = $signatures[0]["signature_id"];

      $response = $this->getEmbeddedSignUrl($signature_id);

      $sign_url = $response["embedded"]["sign_url"];

      $data = [
        "user" => $user,
        "sign_url" => $sign_url,
        "signature_request_id" => $signature_request_id
      ];

      return view('documents.credit_form')->with($data);
    }

    public function sign()
    {
      $user = Auth::user();

      if(env('APP_VERSION') != 'production' && env('APP_VERSION') != 'staging' ) {
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

    public function getDocument($signature_request_id)
    {
      $client = new HelloSign\Client(env('HELLOSIGN_API_KEY'));
      $dest_file_path = storage_path() . '/';
      
      return $client->getFiles($signature_request_id, $dest_file_path, HelloSign\SignatureRequest::FILE_TYPE_ZIP);


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

    private function getEmbeddedCreditSignatureRequest($template_id)
    {
      $user = Auth::user();
      $cosigner = $user->cosigners()->get()->first();
      $budget = $user->budget()->get()->first();
      $app = $user->application;
      $ssn = preg_replace ('/^(\d{3})(\d{2})(\d{4})$/', '$1-$2-$3', $user->ssn);

      if($cosigner) {

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
                'name' => 'user_name',
                'value' => $user->name
              ],
              [
                'name' => 'user_name2',
                'value' => $user->name
              ],
              [
                'name' => 'user_ssn',
                'value' => $ssn
              ],
              [
                'name' => 'user_dob',
                'value' => $user->dob
              ],
              [
                'name' => 'user_dl_no',
                'value' => $app->dl_no
              ],
              [
                'name' => 'user_dl_state',
                'value' => $app->dl_state
              ],
              [
                'name' => 'dependencies',
                'value' => $app->dependencies
              ],
              [
                'name' => 'user_address',
                'value' => $user->address
              ],
              [
                'name' => 'user_city',
                'value' => $user->city
              ],
              [
                'name' => 'user_state',
                'value' => $user->state
              ],
              [
                'name' => 'user_zip',
                'value' => $user->zip
              ],
              [
                'name' => 'years_at_address',
                'value' => $app->years_at_address
              ],
              [
                'name' => 'owner_status',
                'value' => $app->owner_status
              ],
              [
                'name' => 'prev_address',
                'value' => $app->prev_address
              ],
              [
                'name' => 'prev_city',
                'value' => $app->prev_city
              ],
              [
                'name' => 'prev_state',
                'value' => $app->prev_state
              ],
              [
                'name' => 'prev_zip',
                'value' => $app->prev_zip
              ],
              [
                'name' => 'employer_name',
                'value' => $app->employer_name
              ],
              [
                'name' => 'employer_phone',
                'value' => $app->employer_phone
              ],
              [
                'name' => 'position',
                'value' => $app->position
              ],
              [
                'name' => 'employer_address',
                'value' => $app->employer_address
              ],
              [
                'name' => 'employer_city',
                'value' => $app->employer_city
              ],
              [
                'name' => 'employer_state',
                'value' => $app->employer_state
              ],
              [
                'name' => 'employer_zip',
                'value' => $app->employer_zip
              ],
              [
                'name' => 'cosigner_name',
                'value' => $cosigner->name
              ],
              [
                'name' => 'cosigner_dob',
                'value' => $cosigner->dob
              ],
              [
                'name' => 'cosigner_ssn',
                'value' => $cosigner->ssn
              ],
              [
                'name' => 'cosigner_dl_no',
                'value' => $app->cosigner_dl_no
              ],
              [
                'name' => 'cosigner_dl_state',
                'value' => $app->cosigner_dl_state
              ],
              [
                'name' => 'cosigner_dependencies',
                'value' => $app->cosigner_dependencies
              ],
              [
                'name' => 'cosigner_address',
                'value' => $cosigner->address
              ],
              [
                'name' => 'cosigner_city',
                'value' => $cosigner->city
              ],
              [
                'name' => 'cosigner_state',
                'value' => $cosigner->state
              ],
              [
                'name' => 'cosigner_zip',
                'value' => $cosigner->zip
              ],
              [
                'name' => 'cosigner_phone',
                'value' => $cosigner->phone
              ],
              [
                'name' => 'cosigner_years_at_address',
                'value' => $app->cosigner_years_at_address
              ],
              [
                'name' => 'cosigner_owner_status',
                'value' => $app->cosigner_owner_status
              ],
              [
                'name' => 'cosigner_mortgage',
                'value' => $app->cosigner_mortgage
              ],
              [
                'name' => 'cosigner_prev_address',
                'value' => $app->cosigner_prev_address
              ],
              [
                'name' => 'cosigner_prev_city',
                'value' => $app->cosigner_prev_city
              ],
              [
                'name' => 'cosigner_prev_state',
                'value' => $app->cosigner_prev_state
              ],
              [
                'name' => 'cosigner_prev_zip',
                'value' => $app->cosigner_prev_zip
              ],
              [
                'name' => 'cosigner_employer_name',
                'value' => $app->cosigner_employer_name
              ],
              [
                'name' => 'cosigner_employer_phone',
                'value' => $app->cosigner_employer_phone
              ],
              [
                'name' => 'cosigner_employer_years',
                'value' => $app->cosigner_prev_zip
              ],
              [
                'name' => 'cosigner_position',
                'value' => $app->cosigner_position
              ],
              [
                'name' => 'cosigner_income',
                'value' => $app->cosigner_income
              ],
              [
                'name' => 'cosigner_employer_address',
                'value' => $app->cosigner_employer_address
              ],
              [
                'name' => 'cosigner_employer_city',
                'value' => $app->cosigner_employer_city
              ],
              [
                'name' => 'cosigner_employer_state',
                'value' => $app->cosigner_employer_state
              ],
              [
                'name' => 'cosigner_employer_zip',
                'value' => $app->cosigner_employer_zip
              ],
            ])
          ];
        } else {
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
                'name' => 'user_name',
                'value' => $user->name
              ],
              [
                'name' => 'user_name2',
                'value' => $user->name
              ],
              [
                'name' => 'user_ssn',
                'value' => $ssn
              ],
              [
                'name' => 'user_dob',
                'value' => $user->dob
              ],
              [
                'name' => 'user_dl_no',
                'value' => $app->dl_no
              ],
              [
                'name' => 'user_dl_state',
                'value' => $app->dl_state
              ],
              [
                'name' => 'dependencies',
                'value' => $app->dependencies
              ],
              [
                'name' => 'user_address',
                'value' => $user->address
              ],
              [
                'name' => 'user_city',
                'value' => $user->city
              ],
              [
                'name' => 'user_state',
                'value' => $user->state
              ],
              [
                'name' => 'user_zip',
                'value' => $user->zip
              ],
              [
                'name' => 'years_at_address',
                'value' => $app->years_at_address
              ],
              [
                'name' => 'owner_status',
                'value' => $app->owner_status
              ],
              [
                'name' => 'prev_address',
                'value' => $app->prev_address
              ],
              [
                'name' => 'prev_city',
                'value' => $app->prev_city
              ],
              [
                'name' => 'prev_state',
                'value' => $app->prev_state
              ],
              [
                'name' => 'prev_zip',
                'value' => $app->prev_zip
              ],
              [
                'name' => 'employer_name',
                'value' => $app->employer_name
              ],
              [
                'name' => 'employer_phone',
                'value' => $app->employer_phone
              ],
              [
                'name' => 'position',
                'value' => $app->position
              ],
              [
                'name' => 'employer_address',
                'value' => $app->employer_address
              ],
              [
                'name' => 'employer_city',
                'value' => $app->employer_city
              ],
              [
                'name' => 'employer_state',
                'value' => $app->employer_state
              ],
              [
                'name' => 'employer_zip',
                'value' => $app->employer_zip
              ]
            ])
          ];
        }

        if (getenv('HELLOSIGN_TEST_MODE') == 1) {
            $data['test_mode'] = 1;
        } else {
          $data['test_mode'] = 0;
        }

        $ch = curl_init('https://api.hellosign.com/v3/signature_request/create_embedded_with_template');

        $response = $this->curlRequest($ch, $data);

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
