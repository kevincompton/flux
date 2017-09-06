<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnboardController extends Controller
{
    
    public function onboard()
    {
      return view('forms.onboard');
    }
}
