@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')
  @if(count($cosigners) > 0)
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
                  <input name="city" type="text" placeholder="City" required>
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
@endsection