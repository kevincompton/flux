@section('body_class', 'body__dashboard')

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
          <li>${{ $budget->afford }}<span>Monthly Payment</span></li>
          <li>${{ round($budget->afford * 0.78765, 2) }}<span>Flex Monthly Payment</span></li>
        </ul>
        <a href="/payment" class="btn">Make A Payment</a>

        @if(count($creditors) > 0)
          <h3>Your Co-Signer</h3>

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
        @else 
          <h3>Add a Co-Applicant</h3>
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
                  <input class="input-phone" name="phone" type="text" placeholder="Phone" required>
                  @if ($errors->has('phone'))
                          <span class="help-block">
                              <strong>{{ $errors->first('phone') }}</strong>
                          </span>
                      @endif
              </div>

              <div class="form-group">
                  <label for="address" class="col-md-4 control-label">Address</label>
                  <input name="address" type="text" placeholder="Address" required>
              </div>

              <div class="form-group small">
                  <label for="city" class="col-md-4 control-label">City</label>
                  <input name="city" type="text" placeholder="city" required>
              </div>

              <div class="form-group small">
                  <label for="state" class="col-md-4 control-label">State</label>
                  @include('partials._state-select')
              </div>

              <div class="form-group small">
                  <label for="zip" class="col-md-4 control-label">Zip</label>
                  <input name="zip" type="text" placeholder="Zip" maxlength="5" required>
                  @if ($errors->has('zip'))
                          <span class="help-block">
                              <strong>{{ $errors->first('zip') }}</strong>
                          </span>
                      @endif
              </div>

              <hr class="clear">

              <div class="form-group">
                <label>Social Security #</label>
                <input class="input-social" type="text" name="ssn" placeholder="SSN">
                @if ($errors->has('ssn'))
                          <span class="help-block">
                              <strong>{{ $errors->first('ssn') }}</strong>
                          </span>
                      @endif
              </div>
              
              <div class="form-group">
                <label>Birth date</label>
                
                <select class="small" name="months" id="months"></select>
                <select class="small" name="days" id="days"></select>
                <select class="small" name="years" id="years"></select>
              </div>

              <div class="actions">
                <button type="submit">Add Co-Applicant</button>
              </div>
          </form>
        @endif

        <h2 class="text-center">Apply For A Flux Secured Credit Card</h2>
        <p class="text-center">Coming Soon</p>
        <div class="text-center">
          <img src="/images/visa.png" />
          <img src="/images/bofl.png" />
        </div>

        <!-- @if($user->flux_credit == "pending")
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
        @endif -->
      </section>
    @endif

    @if(isset($budget->debt))
      <section class="form_creditors">
        

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

          <form role="form" class="creditor-form creditor" method="POST" action="/creditor/new" enctype="multipart/form-data">
              {{ csrf_field() }}
              <label>Creditor Type</label>
              <input class="type-toggle creditor" type="radio" name="type" value="creditor" checked> Creditor<br>
              <input class="type-toggle consolidation" type="radio" name="type" value="consolidation"> Consolidation

              <div class="creditor-tab">
                <h2>Creditor Information</h2>
                <p>{{ $user->name }},
                <br>
                You mentioned earlier that you had approximately ${{ $budget->debt }} in debt that needed resolution.</p>
              </div>

              <div class="consolidation-tab" style="display: none;">
                <h2>Consolidation</h2>
                <p>You may include your rent/mortgage, car payment or other fixed monthly expenses for one convenient monthly payment with no additional fee.</p>
              </div>

              <input name="name" type="text" placeholder="Creditor Name">
              <input name="account" type="text" placeholder="Account #">
              <input name="phone" type="text" placeholder="Creditor / Agency Phone">

              <small class="italic">*You are agreeing to cease all activity in relation to this account which allows Flux Credit to settle the account for less. If you are contacted by this creditor, please refer them to our office by providing our phone number.</small>

              <label for="file">Upload Files (you may choose multiple)</label>
              <small>*Feel free to upload your bills, collector notifications, credit report, etc.</small>
              <input type="file" id="file" name="file[]" multiple>

              <div class="actions">
                <button type="submit">Add Creditor</button>
              </div>
          </form>
        </fieldset>

      </section>
    @endif

  </div>
@endsection