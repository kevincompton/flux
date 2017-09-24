<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\Mail\CustomerInquiry;
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
      Mail::to('ktcompton@gmail.com')->send(new CustomerInquiry($request));

      return redirect('/contact/confirm');
    }

    public function confirmMessage()
    {

      return view('confirm');
    }

}
