@extends('layouts.client')

@section('content')
  <div class="wrapper page_wrap dash_wrap">
    <h2>Welcome, {{ $user->name }}!</h2>

    <p>Thanks for taking the first step towards reinventing your financial future!<br> Once we’ve established contact with your creditors, our personal concierge will contact you with a formal customized program to become Debt Free!
    </p>

    @if(isset($budget->income))
      <section class="stats">
        <h3>Your Budget</h3>
        <ul>
          <li>${{ $budget->income }}<span>Monthly Income</span></li>
          <li>${{ $budget->debt }}<span>Debt</span></li>
          <li>${{ $budget->afford }}<span>Payment</span></li>
        </ul>
        <a href="/payment" class="btn">Make A Payment</a>

        <h3>Invite A Co-Signer</h3>
        <form role="form" method="POST" action="/cosigner/new">
            {{ csrf_field() }}
            <input id="name" placeholder="Name" type="text" name="name" required>
            <input id="email" placeholder="Email" type="text" name="email" required>

            <button type="submit">Invite Co-Signer</button>
        </form>

        <h2 class="text-center">Apply For A Flux Secured Credit Card</h2>
        <div class="text-center">
          <a href="#" class="btn">Apply Now </a>
          <hr>
          <img src="/images/visa.png" />
          <img src="/images/bofl.png" />
        </div>
      </section>
    @endif

    @if(isset($budget->debt))
      <section class="form_creditors">
        <h3>Creditor Information</h3>
        <p>{{ $user->name }},
        <br>
        you mentioned earlier that you had approximately ${{ $budget->debt }} in debt that needed resolution.</p>

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

              <label>Creditor Type</label>
              <input type="radio" name="type" value="consolidation"> Consolidation<br>
              <input type="radio" name="type" value="creditor" checked> Creditor

              <label for="file">Upload Files</label>
              <small>*Feel free to upload your bills, collector notifications, credit report, etc.</small>
              <input type="file" id="file" name="file">

              <button type="submit">Add Creditor</button>
          </form>
        </fieldset>

      </section>
    @endif

  </div>
@endsection