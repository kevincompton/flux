@extends('layouts.client')

@section('content')

    <h1>Welcome, {{ $user->name }}!</h1>

    @if($budget->income)
      <div class="stats">
        <ul>
          <li>${{ $budget->income }}<span>Income</span></li>
          <li>${{ $budget->debt }}<span>Debt</span></li>
          <li>${{ $budget->afford }}<span>Payment</span></li>
        </ul>
      </div>
    @endif

    @if($budget->debt)
      <section class="form_creditors">
        <h2>Creditor Information</h2>
        <p>{{ $user->name }},<br> 
        <br>
        you mentioned earlier that you had approximately {{ $budget->debt }} in debt that needed resolution...</p>

        creditor forms here<br>

        <ul>
            @foreach($creditors as $creditor)
                <li>{{ $creditor->name }}</li>
            @endforeach
        </ul>

        <h3>Add A Creditor</h3>

        <form role="form" method="POST" action="/creditor/new">
            {{ csrf_field() }}
            <input name="name" type="text" placeholder="Creditor Name">
            <input name="account" type="text" placeholder="Account #">
            <input name="phone" type="text" placeholder="Creditor Phone">

            <button type="submit">Add Creditor</button>
        </form>
      </section>
    @endif



@endsection