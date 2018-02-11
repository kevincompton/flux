@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')

<div class="panel">
  <div class="panel-body">
    <h3 class="title-hero">
        Apply For Flux Credit
    </h3>
  <div class="example-box-wrapper">

    @if($user->application)
      <h1 class="text-center">Your Application has been submitted!</h1>
    @else
    <form class="form-horizontal bordered-row" role="form" method="POST" action="/credit/apply">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="dl_no" class="col-md-4 control-label">Driver's License</label>

        <div class="col-md-6">
            <input id="dl_no" placeholder="Driver's License #" type="text" class="form-control" name="dl_no" required autofocus>

            @if ($errors->has('dl_no'))
              <span class="help-block">
                  <strong>{{ $errors->first('dl_no') }}</strong>
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
        <label for="dependencies" class="col-md-4 control-label">Number of Dependencies (including yourself)</label>
        <div class="col-md-6">
            <input id="dependencies" value="1" type="number" class="form-control" name="dependencies" required>

            @if ($errors->has('dependencies'))
              <span class="help-block">
                  <strong>{{ $errors->first('dependencies') }}</strong>
              </span>
            @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="owner_status" class="col-md-4 control-label">Do you rent or own {{ $user->address }}?</label>
        <div class="col-md-6">
          <select name="owner_status" class="form-control" id="owner_status" required>
            <option value="rent">Rent</option>
            <option value="own">Own</option>
          </select>
        </div>
      </div>

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="years_at_address" class="col-md-4 control-label">Number of Years at Address: {{ $user->address }}</label>
        <div class="col-md-6">
            <input id="years_at_address" value="3" type="number" class="form-control prev_address_toggle" data-prev="prev_0" name="years_at_address" required>

            @if ($errors->has('years_at_address'))
              <span class="help-block">
                  <strong>{{ $errors->first('years_at_address') }}</strong>
              </span>
            @endif
        </div>
      </div>

      <span id="prev_0" class="prev_address_form">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="prev_address" class="col-md-4 control-label">Previous Address</label>
          <div class="col-md-6">
              <input id="prev_address" type="text" class="form-control" name="prev_address">

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
              <label class="col-sm-3 control-label" for="prev_city">City</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="prev_city" name="prev_city">
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
                <input type="text" name="prev_zip" class="input-mask form-control" id="prev_zip" data-inputmask="&apos;mask&apos;:&apos;99999&apos;">
              </div>
            </div>
          </div>
        </div>
      </span>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="employer_name" class="col-md-4 control-label">Employer Name</label>
          <div class="col-md-6">
              <input id="employer_name" type="text" class="form-control" name="employer_name" required>

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
          <label for="employer_years" class="col-md-4 control-label">Number of Years with Employer</label>
          <div class="col-md-6">
              <input id="employer_years" value="1" type="number" class="form-control" name="employer_years" required>

              @if ($errors->has('employer_years'))
                <span class="help-block">
                    <strong>{{ $errors->first('employer_years') }}</strong>
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
            <label for="cosigner_dl_no" class="col-md-4 control-label">Co-Signer Drivers License no</label>
            <div class="col-md-6">
                <input id="cosigner_dl_no" type="text" class="form-control" name="cosigner_dl_no" required>

                @if ($errors->has('cosigner_dl_no'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_dl_no') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group">
            <label for="cosigner_dl_state" class="col-md-4 control-label">Driver's License State</label>
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
            <label for="cosigner_owner_status" class="col-md-4 control-label">Do they rent or own {{ $cosigner->address }}?</label>
            <div class="col-md-6">
              <select name="cosigner_owner_status" class="form-control" id="cosigner_owner_status" required>
                <option value="rent">Rent</option>
                <option value="own">Own</option>
              </select>
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_years_at_address" class="col-md-4 control-label">Number of Years at Address: {{ $cosigner->address }}</label>
            <div class="col-md-6">
                <input id="cosigner_years_at_address" value="3" type="number" class="form-control prev_address_toggle" data-prev="prev_1" name="cosigner_years_at_address" required>

                @if ($errors->has('cosigner_years_at_address'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_years_at_address') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <span id="prev_1" class="prev_address_form">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="cosigner_prev_address" class="col-md-4 control-label">Previous Address</label>
              <div class="col-md-6">
                  <input id="cosigner_prev_address" type="text" class="form-control" name="cosigner_prev_address">

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
                    <input type="text" class="form-control" id="cosigner_prev_city" name="cosigner_prev_city">
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
          </span>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_mortgage" class="col-md-4 control-label">Co-Signer Monthly Payment $</label>
            <div class="col-md-6">
                <input id="cosigner_mortgage" value="0" type="number" class="form-control" name="cosigner_mortgage" required>

                @if ($errors->has('cosigner_mortgage'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_mortgage') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="cosigner_income" class="col-md-4 control-label">Co-Signer Annual Income $</label>
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
            <label for="cosigner_employer_years" class="col-md-4 control-label">Number of Years with Employer</label>
            <div class="col-md-6">
                <input id="cosigner_employer_years" value="1" type="number" class="form-control" name="cosigner_employer_years" required>

                @if ($errors->has('cosigner_employer_years'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cosigner_employer_years') }}</strong>
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
            <label for="cosigner_employer_address" class="col-md-4 control-label">Co-Signer's Employer Address</label>
            <div class="col-md-6">
                <input id="cosigner_employer_address" type="text" class="form-control" name="cosigner_employer_address" required>

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
                <label class="col-sm-3 control-label" for="cosigner_employer_city">City</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="cosigner_employer_city" name="cosigner_employer_city" required>
                </div>
              </div>
              <div class="form-group col-sm-3">
                <label class="col-sm-3 control-label" for="cosigner_employer_state">State</label>
                <div class="col-sm-6">
                  @include('partials._state-cosigner-employer-select')
                </div>
              </div>
              <div class="form-group col-sm-3">
                <label class="col-sm-3 control-label" for="cosigner_employer_zip">Zip</label>
                <div class="col-sm-6">
                  <input type="text" name="cosigner_employer_zip" class="input-mask form-control" id="cosigner_employer_zip" data-inputmask="&apos;mask&apos;:&apos;99999&apos;">
                </div>
              </div>
            </div>
          </div>

        @endif

        <div class="form-group text-right">
          <button class="btn btn-lg btn-primary" type="submit">Submit Credit Application</button>
        </div>

    </form>
    @endif

  </div>
</div>


@endsection


@section('footer')
  <script>
    console.log('here');
    $( ".prev_address_toggle" ).change(function() {
      var prev_form_id = $(this).data('prev');

      var prev_form = $("#"+prev_form_id);

      if($(this).val() < 3) {
        $("#"+prev_form_id+" input" ).prop('required',true);
        prev_form.show();
      } else {
        $("#"+prev_form_id+" input" ).prop('required',false);
        prev_form.hide();
      }

    });

  </script>
@endsection