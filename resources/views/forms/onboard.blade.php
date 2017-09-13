@section('body_class', 'body__onboard')

@extends('layouts.client')

@section('content')
  <div class="wrapper">
    <section class="onboard_signup">
      <h1>Refine the Past – Reinvent Your Future</h1>

      <p>Your Fresh Start to Financial Freedom begins here! Please complete the form below to enroll in our program. We respect your privacy and will not sell or share your information. We will not run your credit. Clients who succesfully complete the Flux Credit process will become debt free, be awarded a Flux Visa Secured Credit Card with a credit limit of up to $1,500 and walk away with a savings account of up to $1,875! If you are unsure about how our process works or if you have any questions while you are completing the online form, please contact us 24/7 via Email/Chat/Phone # 866.358.9218</p>

      <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Login with Facebook</a>
   
      <span class="or">or</span>

      <p class="cta"><a href="/register">Register an account</a></p>

      <p class="cta"><a href="/login">Already have an account?</a></p>
    </section>
  </div>
@endsection
