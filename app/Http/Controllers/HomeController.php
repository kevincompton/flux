<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $budget = $user->budget()->get()->first();
        $creditors = $user->creditors()->get();

        if($user->dob) {
            return redirect('/dashboard');
        }

        if($budget) {
            $budget->expenses = $budget->car + $budget->mortgage + $budget->other;
            $budget->afford = ($budget->income - $budget->expenses) * 0.6;

            if($budget->afford < 250) {
                $budget->afford = 250;
            }
        }

        $data = [
            "user" => $user,
            "budget" => $budget,
            "creditors" => $creditors
        ];

        return view('home')->with($data);
    }

    public function poaPlaceholder()
    {
        return view('poa_placeholder');
    }

    public function payment()
    {
        return view('payment');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $budget = $user->budget()->get()->first();
        $creditors = $user->creditors()->get();
        $cosigners = $user->cosigners()->get();

        if($budget) {
            $budget->expenses = $budget->car + $budget->mortgage + $budget->other;
            $budget->afford = ($budget->income - $budget->expenses) * 0.6;

            if($budget->afford < 250) {
                $budget->afford = 250;
            }
        }

        $data = [
            "user" => $user,
            "budget" => $budget,
            "creditors" => $creditors,
            "cosigners" => $cosigners,
        ];

        return view('dashboard')->with($data);
    }

}
