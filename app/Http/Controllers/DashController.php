<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class DashController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();

        if($user->admin ==1) {
            return redirect('/dashboard/admin');
        }

        if(isset($_GET["poa_status"])) {
            $user->poa_status = true;
            $user->save();
        }

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

        return view('dashboard.index')->with($data);
    }

    public function creditReport()
    {
        $user = Auth::user();

        $data = [
            "user" => $user,
        ];

        return view('dashboard.credit_report')->with($data);
    }

    public function uploadCreditReport(Request $request)
    {

        $files = $request->file('file');

        if(!empty($files)) {
            foreach ($files as $key => $file) {
              $name = 'user_' . $user->id . '_' . 'credit_report_' . $key;
              Storage::disk('local')->put($name, $file);
            }        
        }

        return back();

    }

    public function onboardStep()
    {
        return Auth::user()->onboard_step;
    }

    public function onboardUpdate(Request $request)
    {
        $user = Auth::user();

        if($user->onboard_step == 0) {
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zip = $request->zip;
            $user->onboard_step = 1;
            $user->save();
        } elseif($user->onboard_step == 1) {
            $budget = new \App\Budget;
            $budget->user_id = Auth::user()->id;
            $budget->income = (int)str_replace("$", "", $request->income);
            $budget->debt = (int)str_replace("$", "", $request->debt);
            $budget->mortgage = $request->mortgage;
            $budget->car = $request->car;
            $budget->other = $request->other;
            $budget->save();
            $user->onboard_step = 2;
            $user->save();
        } elseif($user->onboard_step == 2) {
            $user->plan = $request->plan;
            $user->onboard_step = 3;
            $user->save();
        } elseif($user->onboard_step = 3) {
            $ssn = str_replace('-', '', $request->ssn);
            $user->ssn = (int)$ssn;
            $user->dob = $request->dob;
            $user->onboard_step = 4;
            $user->save();
        }

        

        return "user updated";
    }

    public function credit()
    {
        $user = Auth::user();
        $cosigner = $user->cosigners->first();

        $data = [
            "user" => $user,
            "cosigner" => $cosigner
        ];

        return view('dashboard.credit')->with($data);
    }

    public function cosigner()
    {
        $user = Auth::user();
        $cosigner = $user->cosigners->first();

        $data = [
            "user" => $user,
            "cosigner" => $cosigner
        ];

        return view('dashboard.cosigner')->with($data);
    }

    public function creditors()
    {
        $user = Auth::user();
        $creditors = $user->creditors()->get();

        $data = [
            "user" => $user,
            "creditors" => $creditors
        ];

      return view('dashboard.creditors')->with($data);
    }
}
