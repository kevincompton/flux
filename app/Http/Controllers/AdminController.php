<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
      $user = Auth::user();
      $users = \App\User::all();

      $data = [
          "user" => $user,
          "users" => $users
      ];

      return view('dashboard.admin.index')->with($data);
    }

    public function cosigners()
    {
      $user = Auth::user();
      $cosigners = \App\CoSigner::all();

      $data = [
          "user" => $user,
          "cosigners" => $cosigners
      ];

      return view('dashboard.admin.cosigners')->with($data);
    }

    public function creditors()
    {
      $user = Auth::user();
      $creditors = \App\Creditor::all();

      $data = [
          "user" => $user,
          "creditors" => $creditors
      ];

      return view('dashboard.admin.creditors')->with($data);
    }

}
