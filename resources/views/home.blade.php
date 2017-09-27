@extends('layouts.client')

@section('content')
    <div class="wrapper page_wrap">
        <nav class="form-nav">
            
        </nav>

        @if(!$user->phone)

            <section class="form_personal-info">
                <form role="form" method="POST" action="/user/update/">
                    {{ csrf_field() }}

                    @if(!$user->phone)
                        <input name="phone" type="text" placeholder="phone">
                    @endif

                    @if(!$user->address)
                        <input name="address" type="text" placeholder="address">
                    @endif

                    @if(!$user->city)
                        <input name="city" type="text" placeholder="city">
                    @endif

                    @if(!$user->state)
                        <input name="state" type="text" placeholder="state">
                    @endif

                    @if(!$user->zip)
                        <input name="zip" type="text" placeholder="zip">
                    @endif

                    <button type="submit">Update</button>

                </form>
            </section>
        
        @endif
        @if(!$user->budget && $user->phone)
            <section class="form_budgeting">
                <form role="form" class="small" method="POST" action="/budget/new">
                    {{ csrf_field() }}
                    <h1>Refine The Past - Reinvent Your Future!</h1>

                    <h2>Net Monthly Income</h2>
                    <p>The amount you enter should accurately reflect all Household Take Home Pay from All Sources after taxes and deductions, including alimony, disability and social security. This information will remain confidential and is only used internally to help tailor the perfect solution for you.</p>

                    <div id="income_range">
                        <input name="income" id="income" type="range" value="2500" step="25" min="1000" max="20000">

                        <div class="range income">
                          <small class="min pull-left">Min</small>
                          <small class="max pull-right">Max</small>
                        </div>

                        <p id="helper" class="slideRight text-center income"><small>Slide to get started &#x2192</small></p>
                    </div>

                    <h2>Expenses</h2>

                    <h3>Balance Reductions</h3>
                    <p>If you have any credit cards that are maxed out, personal loans, repossessions, evictions, medical bills, or any other credit account that you are behind on or struggling with, the Flux Credit balance reduction program may be right for you. Please determine what your approximate total balance due is. Please only include those accounts that are closed or you intend to close. Do not include the balances due on your current vehicles or rent/mortgage.</p>

                    <div id="debt_range">
                        <input name="debt" id="debt" type="range" value="2500" step="25" min="0" max="150000">

                        <div class="range debt">
                          <small class="min pull-left">Min</small>
                          <small class="max pull-right">Max</small>
                        </div>

                        <p id="helper" class="slideRight text-center debt"><small>Slide to get started &#x2192</small></p>
                    </div>

                    <h3>Fixed Monthly Expenses</h3>
                    <p>Please complete the section below to estimate what your fixed monthly expenses are. You should not include any payment
        on any balance you included above for reduction. <br> <span class="italic">*You should include everything else, such as: Insurance (not deducted from your pay check), Utilities, Student Loans, and personal food, clothes, entertainment and childcare expenses.</span></p>
                    <div class="form-group-large">
                        <input type="text" name="mortgage" placeholder="Rent / Mortgage">
                        <input type="text" name="car" placeholder="Car Payment(s)">
                        <input type="text" name="other" placeholder="*Other">
                    </div>

                    <div class="actions">
                        <button type="submit">Continue</button>
                    </div>
                </form>
            </section>
        @endif
        @if(!$user->plan && $user->budget)
            <section class="form_plan">
                <h2>Congratulations {{ $user->name }},</h2>
                <p>Based on the information you provided, you should be able to comfortably afford <strong>${{ $budget->afford }} per month</strong>.</p>

                <P>By maintaining this payment for <strong>{{ round(($budget->debt * 0.64321) / $budget->afford) }} months</strong>, you should become Debt Free!</p> 

                <p>In addition to the Flux Credit Card you will soon receive, you'll earn Cash Back and a Federally Insured Savings Account of at least <strong>$1,000</strong>.</p>

                <p>If you can’t afford this payment, Flux Flex is there when you need it. Unlike other companies that automatically draft your account for a specific amount each month, we give you the power to control your financial future.</p>

                <p>With Flux Flex, your estimated payment would be <strong>${{ round($budget->afford * 0.78765, 2) }} per month</strong>.</p>
                
                <h2>Start Saving Today!</h2>
                 
                <p>To get started, please choose between:</p> 

                @include('partials._products-select')
                
                <br>
                <p>If you are unsure which program is right for you, please
                read about the benefits of each. If you have any additional questions, please don't hesitate to contact us 24/7 via Email or Phone.</p>
            </section>
        @endif
        @if($user->plan && !$user->ssn)
            <section class="form_poa">
                <form class="small" role="form" method="POST" action="/user/poa/">
                    <h2>Your Future Begins Now!</h2>
                    <p>Please provide us your personal information to generate an official Power Of Attorney, which authorizes Flux Credit to communicate with your creditors.</p>

                    <div class="ssl row">
                        <p class="col-xs-12">Site Secured By</p>
                        <a href="https://letsencrypt.org/how-it-works/"><img class="col-xs-6" src="//fluxcredit.com/wp-content/themes/fluxcredit/img/lets-encrypt-logo.svg" alt=""></a>     
                    </div>

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="ssn">Social Secuirty #</label>
                        <input class="input-social" type="text" name="ssn" placeholder="SSN" required>
                        @if ($errors->has('ssn'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ssn') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label>Birth date</label>

                        <select class="small" name="months" id="months" required></select>
                        <select class="small" name="days" id="days" required></select>
                        <select class="small" name="years" id="years" required></select>
                    </div>

                    <button type="submit">Continue</button>
                </form>

            </section>
        @endif


    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/jquery.matchHeight-min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('.pricingTable').matchHeight();
    });
    </script>
@endsection
