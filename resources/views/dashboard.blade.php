@extends('layouts.client')

@section('content')

    <h1>Welcome, {{ $user->name }}!</h1>

    <div class="stats">
      <ul>
        <li>${{ $budget->income }}<span>Income</span></li>
        <li>${{ $budget->debt }}<span>Debt</span></li>
        <li>${{ $budget->afford }}<span>Payment</span></li>
      </ul>
    </div>

    <h2 class="section-heading">Profile Completeness</h2>
    <div class="progress-bar">
      <span class="meter" style="width: 60%"></span>
    </div>



@endsection