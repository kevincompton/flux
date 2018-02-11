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
            <input id="applicant_dependencies" value="1" type="number" class="form-control" name="applicant_dependencies" required autofocus>

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
            <input id="address_time" value="1" type="number" class="form-control" name="address_time" required autofocus>

            @if ($errors->has('address_time'))
              <span class="help-block">
                  <strong>{{ $errors->first('address_time') }}</strong>
              </span>
            @endif
        </div>
      </div>

      // if less than 3 years ---> prev address

    </form>
  </div>
</div>


// employer name, phone, years there, position, address, annual income, other income
// co-app DL #, dependencies (including self), time at address, monthly payment, owner status
  // if less than 3 years ---> prev address
// co-app employer name, phone, years there, position, address, annual income, other income
// co-app annual and other income

@endsection