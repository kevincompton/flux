<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Mail\AdminDashUpdate;
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
          $name = 'user_' . $user->id . 'file_' . $key;
          Storage::disk('local')->put($name, $file);
        }
        
      }

      if(env('APP_VERSION') == 'production') {
          $creditor = get_object_vars($creditor);

          $data = [
            "update" => $creditor,
            "name" => $user->name,
            "action" => 'added a creditor'
          ];

          Mail::to(env('ADMIN_EMAIL'))->send(new AdminDashUpdate($data));
      }

      return back();

    }

}
