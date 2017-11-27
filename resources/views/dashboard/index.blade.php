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
                             Budget information
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
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="phone">Phone</label>
                            <div class="col-sm-6">
                              <input id="phone" type="text" pattern=".{10,15}" name="phone" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;(999) 999-9999&apos;" required>
                            </div>
                          </div>
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
                                    <p>The amount you enter should accurately reflect all Household Take Home Pay from All Sources after taxes and deductions, including alimony, disability and social security. This information will remain confidential and is only used internally to help tailor the perfect solution for you.</p>
                                    <div class="col-sm-7 col-sm-offset-2">
                                        <div id="horizontal-slider"></div>
                                        <div class="input-group slider_output">
                                          <span class="input-group-addon">Net Monthly Income:</span>
                                          <input type="text" id="amount" name="income" class="form-control" placeholder="Price range ...">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="form-group copy">
                                    <h2>Expenses</h2>

                                    <h3>Balance Reductions</h3>
                                    <p>If you have any credit cards that are maxed out, personal loans, repossessions, evictions, medical bills, or any other credit account that you are behind on or struggling with, the Flux Credit balance reduction program may be right for you. Please determine what your approximate total balance due is. Please only include those accounts that are closed or you intend to close. Do not include the balances due on your current vehicles or rent/mortgage.</p>

                                    <div class="col-sm-7 col-sm-offset-2">
                                        <div id="horizontal-slider-2"></div>
                                        <div class="input-group slider_output">
                                          <span class="input-group-addon">Balance Reductions:</span>
                                          <input type="text" name="debt" id="amount-2" class="form-control" placeholder="Price range ...">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="form-group copy">

                                    <h3>Fixed Monthly Expenses</h3>
                                    <p>Please complete the section below to estimate what your fixed monthly expenses are. You should not include any payment
                        on any balance you included above for reduction. <br> <span class="italic">*You should include everything else, such as: Insurance (not deducted from your pay check), Utilities, Student Loans, and personal food, clothes, entertainment and childcare expenses.</span></p>
                                  
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
                                    <label class="col-sm-3 control-label" for="other">Other:</label>
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
@else 
  <div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            Your Budget
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
                          Monthly Payment
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

                <div class="col-md-3">
                  <div class="tile-box bg-green">
                      <div class="tile-header">
                          Flex Monthly Payment
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
              </div>
              <div class="row" style="padding: 015px;">

                <form style="clear:both;" role="form" class="form-horizontal bordered-row" method="POST" action="/budget/new">
                  <div class="form-group text-right">
                      <a href="/payment" class="btn btn-lg btn-primary" type="submit">Make A Payment</a>
                  </div>
                </form>
                    


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
            </div>
        </div>
    </div>
  </div>
@endif



  </div>
@endsection