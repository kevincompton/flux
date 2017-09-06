<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CreditorController extends Controller
{
    
    public function create(Request $request)
    {

      $creditor = new \App\Creditor;
      $creditor->user_id = Auth::user()->id;
      $creditor->name = $request->name;
      $creditor->account = $request->account;
      $creditor->phone = $request->phone;
      $creditor->save();

      return back();

    }

}
