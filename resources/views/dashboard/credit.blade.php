@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')

<div class="panel">
  <div class="panel-body">
    <h3 class="title-hero">
        Apply For Flux Credit
    </h3>
  <div class="example-box-wrapper">
    <form class="form-horizontal bordered-row" role="form" method="POST" action="/cosigner/new">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="drivers_license" class="col-md-4 control-label">Driver's License</label>

        <div class="col-md-6">
            <input id="drivers_license_no" placeholder="Driver's License #" type="text" class="form-control" name="drivers_license_no" required autofocus>

            @if ($errors->has('drivers_license_no'))
              <span class="help-block">
                  <strong>{{ $errors->first('drivers_license_no') }}</strong>
              </span>
            @endif
        </div>

      </div>

      <div class="form-group">
          <label for="dl_state" class="col-md-4 control-label">Driver's License State</label>
          <div class="col-md-6">
            @include('partials._state-select')
          </div>
      </div>

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="applicant_dependencies" class="col-md-4 control-label">Number of Dependencies (including yourself)</label>
        <div class="col-md-6">
            <input id="applicant_dependencies" value="1" type="number" class="form-control" name="applicant_dependencies" required>

            @if ($errors->has('applicant_dependencies'))
              <span class="help-block">
                  <strong>{{ $errors->first('applicant_dependencies') }}</strong>
              </span>
            @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="address_time" class="col-md-4 control-label">Number of Years at Address: {{ $user->address }}</label>
        <div class="col-md-6">
            <input id="address_time" value="3" type="number" class="form-control" name="address_time" required>

            @if ($errors->has('address_time'))
              <span class="help-block">
                  <strong>{{ $errors->first('address_time') }}</strong>
              </span>
            @endif
        </div>
      </div>

        // if less than 3 years
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="address_time" class="col-md-4 control-label">Previous Address</label>
          <div class="col-md-6">
              <input id="prev_address" type="text" class="form-control" name="prev_address" required>

              @if ($errors->has('prev_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('prev_address') }}</strong>
                </span>
              @endif
          </div>
        </div>
        <div class="form-group">
          <div class="form-row col-sm-8 col-sm-offset-2">
            <div class="form-group col-sm-6">
              <label class="col-sm-3 control-label" for="inputCity">City</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="inputCity" name="prev_city" required>
              </div>
            </div>
            <div class="form-group col-sm-3">
              <label class="col-sm-3 control-label" for="prev_state">State</label>
              <div class="col-sm-6">
                @include('partials._state-select')
              </div>
            </div>
            <div class="form-group col-sm-3">
              <label class="col-sm-3 control-label" for="prev_zip">Zip</label>
              <div class="col-sm-6">
                <input type="text" name="prev_zip" class="input-mask form-control" id="zip" data-inputmask="&apos;mask&apos;:&apos;99999&apos;">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="employer_name" class="col-md-4 control-label">Employer Name</label>
          <div class="col-md-6">
              <input id="employer_name" type="text" class="form-control" name="prev_address" required>

              @if ($errors->has('employer_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('employer_name') }}</strong>
                </span>
              @endif
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="employer_phone">Employer Phone</label>
          <div class="col-md-6">
            <input id="phone" type="text" pattern=".{10,15}" name="employer_phone" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;(999) 999-9999&apos;" required>
          </div>
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="address_time" class="col-md-4 control-label">Number of Years with Employer</label>
          <div class="col-md-6">
              <input id="address_time" value="1" type="number" class="form-control" name="address_time" required>

              @if ($errors->has('address_time'))
                <span class="help-block">
                    <strong>{{ $errors->first('address_time') }}</strong>
                </span>
              @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="position" class="col-md-4 control-label">Position</label>
          <div class="col-md-6">
              <input id="employer_name" type="text" class="form-control" name="position" required>

              @if ($errors->has('position'))
                <span class="help-block">
                    <strong>{{ $errors->first('position') }}</strong>
                </span>
              @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="employer_address" class="col-md-4 control-label">Employer Address</label>
          <div class="col-md-6">
              <input id="employer_address" type="text" class="form-control" name="employer_address" required>

              @if ($errors->has('employer_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('employer_address') }}</strong>
                </span>
              @endif
          </div>
        </div>

        <div class="form-group">
          <div class="form-row col-sm-8 col-sm-offset-2">
            <div class="form-group col-sm-6">
              <label class="col-sm-3 control-label" for="employer_city">City</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="employer_city" name="employer_city" required>
              </div>
            </div>
            <div class="form-group col-sm-3">
              <label class="col-sm-3 control-label" for="employer_state">State</label>
              <div class="col-sm-6">
                @include('partials._state-employer-select')
              </div>
            </div>
            <div class="form-group col-sm-3">
              <label class="col-sm-3 control-label" for="employer_zip">Zip</label>
              <div class="col-sm-6">
                <input type="text" name="employer_zip" class="input-mask form-control" id="zip" data-inputmask="&apos;mask&apos;:&apos;99999&apos;">
              </div>
            </div>
          </div>
        </div>

        @if($cosigner)

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_dl" class="col-md-4 control-label">Co-Signer Drivers License no</label>
            <div class="col-md-6">
                <input id="cosigner_dl" type="text" class="form-control" name="cosigner_dl" required>

                @if ($errors->has('cosigner_dl'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_dl') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group">
            <label for="cosigner_state" class="col-md-4 control-label">Driver's License State</label>
            <div class="col-md-6">
              @include('partials._state-cosigner-select')
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_dependencies" class="col-md-4 control-label">Number of Dependencies (including co-signer)</label>
            <div class="col-md-6">
                <input id="cosigner_dependencies" value="1" type="number" class="form-control" name="cosigner_dependencies" required>

                @if ($errors->has('cosigner_dependencies'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_dependencies') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_time" class="col-md-4 control-label">Number of Years at Address: {{ $cosigner->address }}</label>
            <div class="col-md-6">
                <input id="cosigner_time" value="3" type="number" class="form-control" name="cosigner_time" required>

                @if ($errors->has('cosigner_time'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_time') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          // if less than 3 years
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_prev_address" class="col-md-4 control-label">Previous Address</label>
            <div class="col-md-6">
                <input id="cosigner_prev_address" type="text" class="form-control" name="cosigner_prev_address" required>

                @if ($errors->has('cosigner_prev_address'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_prev_address') }}</strong>
                  </span>
                @endif
            </div>
          </div>
          <div class="form-group">
            <div class="form-row col-sm-8 col-sm-offset-2">
              <div class="form-group col-sm-6">
                <label class="col-sm-3 control-label" for="cosigner_prev_city">City</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="cosigner_prev_city" name="cosigner_prev_city" required>
                </div>
              </div>
              <div class="form-group col-sm-3">
                <label class="col-sm-3 control-label" for="cosigner_prev_state">State</label>
                <div class="col-sm-6">
                  @include('partials._state-cosigner-address-select')
                </div>
              </div>
              <div class="form-group col-sm-3">
                <label class="col-sm-3 control-label" for="cosigner_prev_zip">Zip</label>
                <div class="col-sm-6">
                  <input type="text" name="cosigner_prev_zip" class="input-mask form-control" id="zip" data-inputmask="&apos;mask&apos;:&apos;99999&apos;">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_monthly_payment" class="col-md-4 control-label">Co-Signer Monthly Payment $</label>
            <div class="col-md-6">
                <input id="cosigner_monthly_payment" value="0" type="number" class="form-control" name="cosigner_time" required>

                @if ($errors->has('cosigner_monthly_payment'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_monthly_payment') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_income" class="col-md-4 control-label">C-Signer Annual Income $</label>
            <div class="col-md-6">
                <input id="cosigner_income" value="0" type="number" class="form-control" name="cosigner_income" required>

                @if ($errors->has('cosigner_income'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_income') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_employer_name" class="col-md-4 control-label">Co-Signer Employer Name</label>
            <div class="col-md-6">
                <input id="cosigner_employer_name" type="text" class="form-control" name="cosigner_employer_name" required>

                @if ($errors->has('cosigner_employer_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_employer_name') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="cosigner_employer_phone">Co-Signer Employer Phone</label>
            <div class="col-md-6">
              <input id="phone" type="text" pattern=".{10,15}" name="cosigner_employer_phone" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;(999) 999-9999&apos;" required>
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_employer_time" class="col-md-4 control-label">Number of Years with Employer</label>
            <div class="col-md-6">
                <input id="cosigner_employer_time" value="1" type="number" class="form-control" name="cosigner_employer_time" required>

                @if ($errors->has('cosigner_employer_time'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_employer_time') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_position" class="col-md-4 control-label">Co-Signer Position</label>
            <div class="col-md-6">
                <input id="cosigner_position" type="text" class="form-control" name="cosigner_position" required>

                @if ($errors->has('cosigner_position'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_position') }}</strong>
                  </span>
                @endif
            </div>
          </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="employer_address" class="col-md-4 control-label">Employer Address</label>
          <div class="col-md-6">
              <input id="employer_address" type="text" class="form-control" name="employer_address" required>

              @if ($errors->has('employer_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('employer_address') }}</strong>
                </span>
              @endif
          </div>
        </div>

        <div class="form-group">
          <div class="form-row col-sm-8 col-sm-offset-2">
            <div class="form-group col-sm-6">
              <label class="col-sm-3 control-label" for="employer_city">City</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="employer_city" name="employer_city" required>
              </div>
            </div>
            <div class="form-group col-sm-3">
              <label class="col-sm-3 control-label" for="employer_state">State</label>
              <div class="col-sm-6">
                @include('partials._state-employer-select')
              </div>
            </div>
            <div class="form-group col-sm-3">
              <label class="col-sm-3 control-label" for="employer_zip">Zip</label>
              <div class="col-sm-6">
                <input type="text" name="employer_zip" class="input-mask form-control" id="zip" data-inputmask="&apos;mask&apos;:&apos;99999&apos;">
              </div>
            </div>
          </div>
        </div>

        @endif

    </form>
  </div>
</div>


// co-app DL #, dependencies (including self), time at address, monthly payment, owner status
  // if less than 3 years ---> prev address
// co-app employer name, phone, years there, position, address, annual income, other income
// co-app annual and other income

@endsection