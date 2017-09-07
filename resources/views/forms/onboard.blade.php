@extends('layouts.client')

@section('content')
  <div class="wrapper">
    <section class="onboard_signup">
      <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Login with Facebook</a>
   
      <span class="or">or</span>

      <p><a href="/register">Register an account</a></p>

      <p><a href="/login">Already have an account?</a></p>
    </section>
  </div>
@endsection
