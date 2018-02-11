<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use Mail;
use Illuminate\Http\Request;

class DashController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function renderPDF()
    {
        $user = Auth::user();
        $application = $user->application;
        $cosigner = $user->cosigners->first();
        $handle = str_replace(" ", "_", $user->name);

        $data = [
          "user" => $user,
          "app" => $application,
          "cosigner" => $cosigner,
          "handle" => $handle
        ];

        $pdf = PDF::loadView('dashboard.pdf.credit_application', $data);

        $pdf->save(storage_path('pdf/credit-applications/' . $handle . '_flux_visa_application.pdf'));

        if(env('APP_VERSION') == 'production') {
            Mail::send('emails.admin_new_credit_application', $data, function ($message) use ($handle) {
                $message->attach(storage_path('pdf/credit-applications/' . $handle . '_flux_visa_application.pdf'));
                $message->to(env('ADMIN_EMAIL'), 'Flux Admin')->subject('New Credit Application');
            });
        }

        return $pdf->download($handle . '_flux_visa_application.pdf');
    }

    public function creditApply(Request $request)
    {
        $user = Auth::user();
        // grab all inputs and create application object

        $app = new \App\Application;
        $app->user_id = $user->id;
        $app->dl_no = $request->dl_no;
        $app->dl_state = $request->state;
        $app->dependencies = $request->dependencies;
        $app->years_at_address = $request->years_at_address;
        $app->owner_status = $request->owner_status;
        
        if($app->years_at_address < 3) {
            $app->prev_address = $request->prev_address;
            $app->prev_city = $request->prev_city;
            $app->prev_state = $request->prev_state;
            $app->prev_zip = $request->prev_zip;
        }

        $app->employer_name = $request->employer_name; 
        $app->employer_phone = $request->employer_phone; 
        $app->employer_years = $request->employer_years; 
        $app->position = $request->position; 
        $app->employer_address = $request->employer_address; 
        $app->employer_city = $request->employer_city; 
        $app->employer_state = $request->employer_state; 
        $app->employer_zip = $request->employer_zip; 

        if($user->cosigner) {
            $app->cosigner_dl_no = $request->cosigner_dl_no; 
            $app->cosigner_dl_state = $request->cosigner_dl_state; 
            $app->cosigner_dependencies = $request->cosigner_dependencies; 
            $app->cosigner_years_at_address = $request->cosigner_years_at_address;

            if($app->cosigner_years_at_address < 3) {
                $app->cosigner_prev_address = $request->cosigner_prev_address; 
                $app->cosigner_prev_city = $request->cosigner_prev_city; 
                $app->cosigner_prev_state = $request->cosigner_prev_state; 
                $app->cosigner_prev_zip = $request->cosigner_prev_zip;
            }

            $app->cosigner_employer_name = $request->cosigner_employer_name; 
            $app->cosigner_employer_phone = $request->cosigner_employer_phone;
            $app->cosigner_employer_years = $request->cosigner_employer_years;
            $app->cosigner_position = $request->cosigner_position;
            $app->cosigner_income = $request->cosigner_income;
            $app->cosigner_mortgage = $request->cosigner_mortgage;
            $app->cosigner_owner_status = $request->cosigner_owner_status; 
        }

        $app->save();

        return back();

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
