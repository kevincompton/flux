<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\Mail\CustomerInquiry;
use App\Mail\CustomerCreditApplication;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
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
        'ssn' => 'required|min:9|max:9',
        'zip' => 'required|string|max:5|min:5',
      ]);
      
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
      $cosigner->ssn = $request->ssn;
      $cosigner->dob = $request->months.$request->days.$request->years;
      $cosigner->save();

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

    public function poa(Request $request)
    {

      $request->validate([
        'ssn' => 'required|min:9'
      ]);

      $ssn = str_replace(' ', '', $request->ssn);

      $user = Auth::user();
      $user->ssn = $ssn;
      $user->dob = $request->months.$request->days.$request->years;
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
