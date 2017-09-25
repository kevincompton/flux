<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Illuminate\Http\File;

class CreditorController extends Controller
{
    
    public function create(Request $request)
    {
      $user = Auth::user();

      $creditor = new \App\Creditor;
      $creditor->user_id = Auth::user()->id;
      $creditor->name = $request->name;
      $creditor->account = $request->account;
      $creditor->phone = $request->phone;
      $creditor->type = $request->type;
      $creditor->save();

      $files = $request->file('file');

      if(!empty($files)) {
        foreach ($files as $key => $file) {
          $name = 'user_' . $user->id . $key;
          Storage::disk('local')->file($file)->storeAs($name, $user->id);
        }
        
      }

      return back();

    }

}
