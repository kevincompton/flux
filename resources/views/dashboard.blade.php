@extends('layouts.client')

@section('content')
  <div class="wrapper page_wrap dash_wrap">
    <h1>Welcome, {{ $user->name }}!</h1>

    @if(isset($budget->income))
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

        @if(count($creditors) > 0)
          <h3>Your Creditors</h3>

          <table>
            <tbody>
             <tr>
               <th>Name</th>
               <th>Phone</th>
               <th>Account #</th>
             </tr> 
              @foreach($creditors as $creditor)
                  <tr>
                    <td>{{ $creditor->name }}</td>
                    <td>{{ $creditor->phone }}</td>
                    <td>{{ $creditor->account }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        @endif

        <fieldset>
          <h3>Add A Creditor</h3>

          <form role="form" method="POST" action="/creditor/new">
              {{ csrf_field() }}
              <input name="name" type="text" placeholder="Creditor Name">
              <input name="account" type="text" placeholder="Account #">
              <input name="phone" type="text" placeholder="Creditor Phone">

              <button type="submit">Add Creditor</button>
          </form>
        </fieldset>

      </section>
    @endif

  </div>
@endsection