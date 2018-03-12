<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    
    public function create(Request $request)
    {

      $user = Auth::user();
      $budget_expenses = $request->car + $request->mortgage + $request->other;
      $budget_afford = ($request->income - $budget_expenses) * 0.6;

      $budget = new \App\Budget;
      $budget->user_id = $user->id;
      $budget->income = $request->income;
      $budget->debt = $request->debt;
      $budget->mortgage = $request->mortgage;
      $budget->car = $request->car;
      $budget->other = $request->other;
      $budget->preferred_payment = round($budget_afford * 0.78765, 2);
      $budget->save();

      return back();

    }

    public function updatePayment(Request $request)
    {

      $user = Auth::user();
      $budget = $user->budget;
      $budget->preferred_payment = $request->amount;
      $budget->save();

      return back();
    }

    public function plus()
    {
      
      $user = Auth::user();
      $user->plan = "plus";
      $user->save();

      return back();

    }

    public function prime()
    {
      
      $user = Auth::user();
      $user->plan = "prime";
      $user->save();

      return back();

    }

}
