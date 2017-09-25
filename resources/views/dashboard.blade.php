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

        @if(count($creditors) > 0)
          <h3>Your Co-Signers</h3>

          <table>
            <tbody>
             <tr>
               <th>Name</th>
               <th>Phone</th>
               <th>Email</th>
             </tr> 
              @foreach($cosigners as $cosigner)
                  <tr>
                    <td>{{ $cosigner->name }}</td>
                    <td>{{ $cosigner->phone }}</td>
                    <td>{{ $cosigner->email }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        @endif

        <h3>Invite A Co-Signer</h3>
        <form role="form" method="POST" action="/cosigner/new">
            {{ csrf_field() }}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" placeholder="Name" type="text" class="form-control" name="name" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" placeholder="Email" type="email" class="form-control" name="email" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Phone</label>
                <input name="phone" type="text" placeholder="phone" required>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Address</label>
                <input name="address" type="text" placeholder="address" required>
            </div>

            <div class="form-group small">
                <label for="password-confirm" class="col-md-4 control-label">City</label>
                <input name="city" type="text" placeholder="city" required>
            </div>

            <div class="form-group small">
                <label for="password-confirm" class="col-md-4 control-label">State</label>
                <input name="state" type="text" placeholder="state" required>
            </div>

            <div class="form-group small">
                <label for="password-confirm" class="col-md-4 control-label">Zip</label>
                <input name="zip" type="text" placeholder="zip" required>
            </div>

            <label>Social Secuirty #</label>
            <input type="number" name="ssn" placeholder="SSN">
            
            <label>Birth date</label>
            
            <select class="small" name="months" id="months"></select>
            <select class="small" name="days" id="days"></select>
            <select class="small" name="years" id="years"></select>

            <div class="actions">
              <button type="submit">Add Co-Signer</button>
            </div>
        </form>

        @if($user->flux_credit == "pending")
          <h2 class="text-center">Apply For A Flux Secured Credit Card</h2>
          <p class="text-center">Your application is pending, we will get back to you shortly</p>
        @elseif($user->flux_credit != "denied")
          <h2 class="text-center">Apply For A Flux Secured Credit Card</h2>
          <div class="text-center">
            <a href="/credit/apply" class="btn">Apply Now </a>
            <hr>
            <img src="/images/visa.png" />
            <img src="/images/bofl.png" />
          </div>
        @endif
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

              <div class="actions">
                <button type="submit">Add Creditor</button>
              </div>
          </form>
        </fieldset>

      </section>
    @endif

  </div>
@endsection