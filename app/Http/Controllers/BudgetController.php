<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    
    public function create(Request $request)
    {

      $budget = new \App\Budget;
      $budget->user_id = Auth::user()->id;
      $budget->income = $request->income;
      $budget->debt = $request->debt;
      $budget->mortgage = $request->mortgage;
      $budget->car = $request->car;
      $budget->other = $request->other;
      $budget->save();

      return back();

    }

    public function plus($user)
    {
      
      $user = Auth::user();
      $user->plan = "plus";
      $user->save();

      return back();

    }

    public function prime($user)
    {
      
      $user = Auth::user();
      $user->plan = "prime";
      $user->save();

      return back();

    }

}
