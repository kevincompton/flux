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

    public function poa(Request $request)
    {

      $user = Auth::user();
      $user->ssn = $request->ssn;
      $user->dob = $request->dob;
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
