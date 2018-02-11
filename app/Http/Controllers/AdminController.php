<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function deleteUser($userID) {
      $user = \App\User::find($userID);
      $user->delete();

      return back();
    }

    public function poaComplete($userID)
    {
      $user = \App\User::find($userID);
      $user->poa_status = true;
      $user->save();

      return back();
    }

    public function poaIncomplete($userID)
    {
      $user = \App\User::find($userID);
      $user->poa_status = false;
      $user->save();

      return back();
    }

    public function index()
    {
      $user = Auth::user();
      $customers = \App\User::all();

      $data = [
          "user" => $user,
          "customers" => $customers
      ];

      return view('dashboard.admin.index')->with($data);
    }

    public function showBudget($id)
    {
      $user = Auth::user();
      $budget = \App\Budget::find($id);
      $client = $budget->user;

      $data = [
        "user" => $user,
        "budget" => $budget,
        "client" => $client
      ];

      return view('dashboard.admin.budget')->with($data);
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
