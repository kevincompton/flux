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
      $user = Auth::user();
      $client = new HelloSign\Client(getenv('HELLOSIGN_API_KEY'));
      $request = new HelloSign\TemplateSignatureRequest;
      $request->setTemplateId(getenv('HELLOSIGN_TEMPLATE_ID'));
      if (getenv('HELLOSIGN_TEST_MODE') == 1)
      {
       $request->enableTestMode();
      }

      $request->setSigner('Signer', $user->email, $user->name);

      $embedded_request = new HelloSign\EmbeddedSignatureRequest($request, getenv('HELLOSIGN_CLIENT_KEY'));
      $response = $client->createEmbeddedSignatureRequest($embedded_request);

      $signature_request_id = $response->getId();
      $signatures = $response->getSignatures();

      $signature_id = $signatures[0]->getId();

      $response = $client->getEmbeddedSignUrl($signature_id);
      $sign_url = $response->getSignUrl();

      return View::make('documents.poa')->with('sign_url', $sign_url);
    }

}
