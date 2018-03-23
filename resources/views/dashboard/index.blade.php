@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')
  <div class="wrapper page_wrap dash_wrap">

      @if($user->onboard_step < 4)

        <div class="panel">
          <div class="panel-body">
              <h3 class="title-hero">
                  Complete Your Profile
              </h3>
            <div class="example-box-wrapper">
                <div id="form-wizard" class="form-wizard">
                    <ul>
                        <li>
                            <a href="#step-1" data-toggle="tab">
                                <label class="wizard-step">1</label>
                          <span class="wizard-description">
                             Personal Information
                             <small>Enter your information to continue</small>
                          </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2" data-toggle="tab">
                                <label class="wizard-step">2</label>
                          <span class="wizard-description">
                             Budget Information
                             <small>Enter your Income, Debt & Expenses</small>
                          </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3" data-toggle="tab">
                                <label class="wizard-step">3</label>
                          <span class="wizard-description">
                             Select Your Plan
                             <small>Choose between Prime or Plus</small>
                          </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-4" data-toggle="tab">
                                <label class="wizard-step">4</label>
                          <span class="wizard-description">
                             Power of Attorney
                             <small>Sign the POA Form to finalize</small>
                          </span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">

                      <div class="tab-pane active" id="step-1">
                        <form action="#" class="form-horizontal bordered-row wizard_form">
                          <input type="hidden" name="onboard_step" value="1" />
                          
                          @if($user->phone == null)
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="phone">Phone</label>
                              <div class="col-sm-6">
                                <input id="phone" type="text" pattern=".{10,15}" name="phone" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;(999) 999-9999&apos;" required>
                              </div>
                            </div>
                          @endif
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="address">Address</label>
                            <div class="col-sm-6">
                              <input id="address" name="address" type="text" class="form-control" id="" placeholder="Your address..." required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-row col-sm-8 col-sm-offset-2">
                              <div class="form-group col-sm-6">
                                <label class="col-sm-3 control-label" for="inputCity">City</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="inputCity" name="city" required>
                                </div>
                              </div>
                              <div class="form-group col-sm-3">
                                <label class="col-sm-3 control-label" for="state">State</label>
                                <div class="col-sm-6">
                                  @include('partials._state-select')
                                </div>
                              </div>
                              <div class="form-group col-sm-3">
                                <label class="col-sm-3 control-label" for="zip">Zip</label>
                                <div class="col-sm-6">
                                  <input type="text" name="zip" class="input-mask form-control" id="zip" data-inputmask="&apos;mask&apos;:&apos;99999&apos;">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group text-right">
                            <button type="submit" class="btn btn-lg btn-primary">Save and Continue</button>
                          </div>
                        </form>
                      </div>

                        <div class="tab-pane" id="step-2">
                            <section class="form_budgeting">
                              <form role="form" class="form-horizontal bordered-row wizard_form" method="POST" action="#">

                                  <div class="form-group copy">
                                    <h2>Net Monthly Income</h2>
                                    <p>This amount should reflect all household sources of take-home pay and your Net Income after deductions. Please include alimony, disability, social security and any other money received.</p>
                                    <div class="col-sm-7 col-sm-offset-2">
                                        <div id="horizontal-slider"></div>
                                        <div class="input-group slider_output">
                                          <span class="input-group-addon">Net Monthly Income:</span>
                                          <input type="text" id="amount" name="income" class="form-control" placeholder="Price range ...">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="form-group copy">
                                    <h2>Total Debt</h2>

                                    <p>If you have any credit cards that are maxed out, personal loans, repossessions, evictions, medical bills, or any other credit account that you are behind on or struggling with, the Flux Credit balance reduction program may be right for you. Please determine what your approximate total balance due is. Please only include those accounts that are closed or you intend to close. Do not include the balances due on your current vehicles or rent/mortgage.</p>

                                    <div class="col-sm-7 col-sm-offset-2">
                                        <div id="horizontal-slider-2"></div>
                                        <div class="input-group slider_output">
                                          <span class="input-group-addon">Total Debt:</span>
                                          <input type="text" name="debt" id="amount-2" class="form-control" placeholder="Price range ...">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="form-group copy">

                                    <h3>Fixed Monthly Expenses</h3>
                                  
                                  </div>

                                  <div class="form-group">
                                    <label class="col-sm-3 control-label" for="mortgage">Rent or Mortgage:</label>
                                    <div class="col-sm-6">
                                      <input type="number" class="form-control" id="mortgage" name="mortgage" placeholder="Rent / Mortgage" required>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-sm-3 control-label" for="car">Car Payment(s):</label>
                                    <div class="col-sm-6">
                                      <input type="number" class="form-control" id="car" name="car" placeholder="Car Payment(s)" required>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-sm-3 control-label" for="other">Other (Insurance, utilities, food, clothes, entertainment, student loans, child care, etc.):</label>
                                    <div class="col-sm-6">
                                      <input type="number" class="form-control" id="other" name="other" placeholder="Other" required>
                                    </div>
                                  </div>

                                  <div class="form-group text-right">
                                      <button class="btn btn-lg btn-primary" type="submit">Save and Continue</button>
                                  </div>
                              </form>
                          </section>
                        </div>
                        <div class="tab-pane" id="step-3">
                            @include('partials._products-select')
                        </div>
                        <div class="tab-pane" id="step-4">
                          <p class="text-center"><strong><i>This information is neccessary for Flux Credit to communicate with your creditors, resolve past debt and improve your credit score.</i></strong></p>
                          <form role="form" class="form-horizontal bordered-row wizard_form" method="POST" action="/budget/new">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">SSN</label>
                                <div class="col-sm-6">
                                    <input type="text" name="ssn" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;999-99-9999&apos;" required>
                                    <div class="help-block">999-99-9999</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Birthday</label>
                                <div class="col-sm-6">
                                    <input type="text" name="dob" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;99-99-9999&apos;" required>
                                    <div class="help-block">MM-DD-YYYY</div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-lg btn-primary" type="submit">Save and Continue</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center"><i>We respect your privacy and will not sell or share your information. We will not run your credit.</i></p>
@elseif($user->active == false) 

  @if($user->poa_status == 0)
    <div class="alert alert-warning">
      <div class="bg-orange alert-icon">
        <i class="glyph-icon icon-warning"></i>
      </div>
      <div class="alert-content">
        <h4 class="alert-title">You have not signed the Power Of Attorney form</h4>
        <p>In order to complete your profile you need to sign the Power of Attorney form. <a href="/poa">Click here to sign now.</a>
      </div>
    </div>
  @endif

  @if(!$user->credit_report)
    <div class="alert alert-success">
      <div class="bg-orange alert-icon">
        <i class="glyph-icon icon-pencil"></i>
      </div>
      <div class="alert-content">
        <h4 class="alert-title">Upload your credit report</h4>
        <p>In order to activate your account we need a copy of your credit report. <a href="/dashboard/credit-report">Click here to upload now.</a>
      </div>
    </div>
  @endif

  <div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            FLUX ESTIMATOR
        </h3>
        <div class="example-box-wrapper">
            <div class="row">
                
                <div class="col-md-3">
                  <div class="tile-box bg-white content-box">
                      <div class="tile-header">
                          Monthly Income
                      </div>
                      <div class="tile-content-wrapper">
                          <i class="glyph-icon tooltip-button icon-sort-desc"></i>
                          <div class="tile-content">
                              <span>$</span>
                              {{ $budget->income }}
                          </div>
                      </div>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="tile-box bg-white content-box">
                      <div class="tile-header">
                          Debt
                      </div>
                      <div class="tile-content-wrapper">
                          <i class="glyph-icon tooltip-button icon-sort-asc"></i>
                          <div class="tile-content">
                              <span>$</span>
                              {{ $budget->debt }}
                          </div>
                      </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="tile-box bg-white content-box">
                      <div class="tile-header">
                          Fixed Expenses
                      </div>
                      <div class="tile-content-wrapper">
                          <i class="glyph-icon tooltip-button icon-sort-asc"></i>
                          <div class="tile-content">
                              <span>$</span>
                              {{ $budget->mortgage + $budget->car + $budget->other }}
                          </div>
                      </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="tile-box bg-white content-box">
                      <div class="tile-header">
                          Months Till Debt Free
                      </div>
                      <div class="tile-content-wrapper">
                          <i class="glyph-icon tooltip-button icon-calendar"></i>
                          <div class="tile-content" id="month_calculator">
                            @if($budget->preferred_payment)
                              {{ ceil($budget->debt / $budget->preferred_payment) }}
                            @else
                              {{ ceil($budget->debt / $budget->afford) }}
                            @endif
                          </div>
                      </div>
                  </div>
                </div>

              </div>
              <div class="row">

                <div class="col-md-4">
                  <div class="tile-box bg-white content-box">
                      <div class="tile-header">
                          Flux Monthly Payment
                      </div>
                      <div class="tile-content-wrapper">
                          <i class="glyph-icon tooltip-button icon-money"></i>
                          <div class="tile-content">
                              <span>$</span>
                              {{ $budget->afford }}
                          </div>
                      </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="tile-box bg-green">
                      <div class="tile-header">
                          Flex Payment Option
                          <div class="float-right">
                              <i class="glyph-icon icon-caret-down"></i>
                              15%
                          </div>
                      </div>
                      <div class="tile-content-wrapper">
                          <i class="glyph-icon tooltip-button icon-money"></i>
                          <div class="tile-content">
                              <span>$</span>
                              {{ round($budget->afford * 0.78765, 2) }}
                          </div>
                      </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="tile-box bg-white content-box">
                      <div class="tile-header">
                          Your Monthly Payment
                      </div>
                      <div class="tile-content-wrapper">
                          <div class="tile-content">
                              $<input id="payment_toggle" type="number" name="payment_amount" value="@if($budget->preferred_payment){{ $budget->preferred_payment }}@endif">
                          </div>
                      </div>
                  </div>
                </div>

              </div>
              <div class="row" style="padding: 0 15px;">

                <div style="clear:both;" class="bordered-row">
                  <div class="form-group text-right">
                      <form id="update_payment_form" role="form" class="form-horizontal" method="POST" action="/dashboard/payment/update">
                        {{ csrf_field() }}

                        <input type="hidden" name="amount" id="amount_selected" value="@if($budget->preferred_payment){{ $budget->preferred_payment }}@endif">
                        <button class="btn btn-lg btn-primary" type="submit">Save Payment Amount</button>
                      </form>
                  </div>
                </div>
                    



              </section>
            </div>
        </div>
    </div>
  </div>
  <p class="text-center"><i>**The above estimate is based on the information you provided and may be revised before finalizing
your program. We encourage you to <a href="/dashboard/credit-report">Upload your Credit Report</a> and/or manually <a href="/dashboard/creditors">Manage Your Creditors</a>
to help us determine the scope of your credit dilemma.</i></p>
@else

<h1>Active User</h1>

@endif



  </div>
@endsection

@section('footer')
  @if($budget)
  <script>
    var debt = {{ $budget->debt }};
    $( "#payment_toggle" ).change(function() {
      var value = $(this).val();
      var months = debt / value;
      $('#amount_selected').val(value);
      $('#month_calculator').text(Math.ceil(months));
    });
  </script>
  @endif
@endsection