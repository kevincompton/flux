@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')
      
      <div class="panel">
          <div class="panel-body">
              <h3 class="title-hero">
                  Add a Co-Applicant
              </h3>
            <div class="example-box-wrapper">
        @if($cosigner)
          <h2>Your Co-Applicant is {{ $cosigner->name }}
        @else

       
          <form class="form-horizontal bordered-row" role="form" method="POST" action="/cosigner/new">
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
                  <div class="col-md-6">
                    <input id="phone" type="text" pattern=".{10,15}" name="phone" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;(999) 999-9999&apos;" required>
                    @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                  </div>
              </div>

              <div class="form-group">
                  <label for="address" class="col-md-4 control-label">Address</label>
                  <div class="col-md-6">
                    <input name="address" type="text" class="form-control" placeholder="Address" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="city" class="col-md-4 control-label">City</label>
                  <div class="col-md-6">
                    <input class="form-control" name="city" type="text" placeholder="City" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="state" class="col-md-4 control-label">State</label>
                  <div class="col-md-6">
                    @include('partials._state-select')
                  </div>
              </div>

              <div class="form-group">
                  <label for="zip" class="col-md-4 control-label">Zip</label>
                  <div class="col-md-6">
                    <input class="form-control" name="zip" type="text" placeholder="Zip" maxlength="5" required>
                    @if ($errors->has('zip'))
                            <span class="help-block">
                                <strong>{{ $errors->first('zip') }}</strong>
                            </span>
                        @endif
                  </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Social Security #</label>
                <div class="col-sm-6">
                                    <input type="text" name="ssn" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;999-99-9999&apos;" required>
                                    <div class="help-block">999-99-9999</div>
                                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-4 control-label">Birth date</label>
                <div class="col-sm-6">
                    <input type="text" name="dob" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;99-99-9999&apos;" required>
                    <div class="help-block">MM-DD-YYYY</div>
                </div>
              </div>

              <div class="form-group text-right">
                <button class="btn btn-lg btn-primary" type="submit">Add Co-Applicant</button>
              </div>
          </form>
      @endif

      </div>
      </div>

@endsection