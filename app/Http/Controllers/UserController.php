<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\Mail\CustomerInquiry;
use App\Mail\AdminDashUpdate;
use App\Mail\CustomerCreditApplication;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function privacy()
  {
    return view('privacy');
  }
    
    public function update(Request $request)
    {

      $user = Auth::user();
      $user->address = $request->address;
      $user->city = $request->city;
      $user->state = $request->state;
      $user->zip = $request->zip;
      $user->phone = $request->phone;
      $user->save();

      return back();

    }

    public function cosign(Request $request)
    {

      $user = Auth::user();

      $request->validate([
        'phone' => 'required|string|min:9',
        'ssn' => 'required|min:9',
        'zip' => 'required|string|max:5|min:5',
      ]);

      $ssn = str_replace('-', '', $request->ssn);
      
      $cosigner = new \App\CoSigner;
      $cosigner->user_id = $user->id;
      $cosigner->name = $request->name;
      $cosigner->email = $request->email;
      $cosigner->phone = $request->phone;
      $cosigner->address = $request->address;
      $cosigner->city = $request->city;
      $cosigner->state = $request->state;
      $cosigner->zip = $request->zip;
      $cosigner->phone = $request->phone;
      $cosigner->ssn = (int)$ssn;
      $cosigner->dob = $request->dob;
      $cosigner->save();

      if(env('APP_VERSION') == 'production') {

          $data = [
            "update" => $cosigner,
            "name" => $user->name,
            "action" => 'added a co-signer'
          ];

          Mail::to(env('ADMIN_EMAIL'))->send(new AdminDashUpdate($data));
      }

      return back();

    }

    public function creditApplication()
    {
      $user = Auth::user();
      $user->flux_credit = "pending";
      $user->save();

      $data = [
        "user" => $user
      ];

      Mail::to(env('ADMIN_EMAIL'))->send(new CustomerCreditApplication($user));

      return back();
    }

    public function prime()
    {
      $user = Auth::user();

      $data = [
        "user" => $user
      ];

      return view('prime')->with($data);
    }

    public function flex()
    {
      $user = Auth::user();

      $data = [
        "user" => $user
      ];

      return view('flex')->with($data);
    }

    public function plus()
    {
      $user = Auth::user();

      $data = [
        "user" => $user
      ];

      return view('plus')->with($data);
    }

    public function cash()
    {
      $user = Auth::user();

      $data = [
        "user" => $user
      ];

      return view('cash')->with($data);
    }

    public function payment()
    {
        return view('payment');
    }

    public function poa(Request $request)
    {

      $request->validate([
        'ssn' => 'required|min:9'
      ]);

      $ssn = str_replace(' ', '', $request->ssn);

      $user = Auth::user();
      $user->ssn = $ssn;
      $user->dob = $request->months.'/'.$request->days.'/'.$request->years;
      $user->save();

      return redirect('/poa');

    }

    public function contact()
    {
      $user = Auth::user();

      $data = [
        "user" => $user
      ];

      return view('contact')->with($data);
    }

    public function sendMessage(Request $request)
    {
      Mail::to(env('ADMIN_EMAIL'))->send(new CustomerInquiry($request));

      return redirect('/contact/confirm');
    }

    public function confirmMessage()
    {

      return view('confirm');
    }

}
