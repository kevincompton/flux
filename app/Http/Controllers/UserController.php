<?php

namespace App\Http\Controllers;

use Auth;
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

      return redirect('poa-placeholder');

    }

}
