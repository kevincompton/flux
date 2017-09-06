@extends('layouts.client')

@section('content')

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
            <form role="form" method="POST" action="/budget/new">
                {{ csrf_field() }}

                <h2>Net Monthly Income</h2>
                <p>The amount you enter should accurately reflect all Household Take Home Pay from All Sources after taxes and
        deductions (Your Net Income). This information will remain confidential and only used internally to help customize
        the best solution for you.</p>

                scrollbar graphic here
                <input type="number" name="income">

                <h2>Expenses</h2>

                <h3>Balance Reductions</h3>
                <p>If you have any credit cards that are maxed out, personal loans, repossessions, evictions, medical bills or any other credit
    account that you are behind on or struggling with, the Flux Credit balance reduction program may be right for you. Please
    determine what your approximate total balance due is. Please only include those accounts that are closed or you intend
    to close. Due not include the balances due on your current vehicles or rent/mortgage.</p>

                scrollbar graphic here
                <input type="number" name="debt">

                <h3>Fixed Monthly Expenses</h3>
                <p>Please complete the section below to estimate what your fixed monthly expenses are. You should not include any payment
    on any balance you included above for reduction.</p>

                <input type="text" name="mortgage" placeholder="Rent / Mortgage">
                <input type="text" name="car" placeholder="Car Payment(s)">
                <input type="text" name="other" placeholder="*Other">

                <button type="submit">Continue</button>
            
            </form>
        </section>
    @endif
    @if(!$user->plan && $user->budget)
        <section class="form_plan">
            <p>Congratulations {{ $user->name }},<br>
            <br>      
            Based on the information you provided, you should be able to comfortably afford: <br> 
            <br>
            {{ $budget->afford }}<br>
            <br>
            By maintaining this payment for X months, you should become Debt Free! In addition to the Flux
            Credit Card you will soon receive, you'll earn Cash Back and a Federally Insured Savings Acoount of at least $1,00</p>
            
            <h2>Start Saving Today!</h2>
             
            <p>To get started, please choose between:</p> 

            <form role="form" method="POST" action="/plan/plus">
                {{ csrf_field() }}
                <button type="submit">Flux Plus</buttom> 
            </button>

            <form role="form" method="POST" action="/plan/prime">
                {{ csrf_field() }}
                <button type="submit">Flux Prime</buttom> 
            </button>
            
            <br>
            <p>If you are unsure which program is right for you, please
            read about the benefits of each. If you have any additional questions, please don't hesitate to <a href="#">contact us</a> 24/7 via Email/Chat/Phone.</p>
        </section>
    @endif
    @if($user->plan && !$user->ssn)
        <section class="form_poa">
            <h2>Your Future Begins Now!</h2>
            <p>By making your initial Flux {{ $user->plan }} payment today, we can immediately start negotiating with your creditors to perfecting your cred....</p>

            payment total here, **Notation, This is a One-Time Payment Only.<br>
            <br>

            <form role="form" method="POST" action="/user/poa/">
                {{ csrf_field() }}
                <input type="number" name="ssn" placeholder="SSN">
                <input type="number" name="dob" placeholder="DOB">

                <button type="submit">Continue</button>
            </form>

        </section>
    @endif
    @if($user->ssn)
        <section class="form_creditors">
            <h2>Creditor Information</h2>
            <p>{{ $user->name }},<br> 
            <br>
            you mentioned earlier that you had approximately {{ $budget->debt }} in debt that needed resolution...</p>

            creditor forms here, upload files, skip section link, submit<br>

            <ul>
                @foreach($creditors as $creditor)
                    <li>{{ $creditor->name }}</li>
                @endforeach
            </ul>

            <h3>Add A Creditor</h3>

            <form role="form" method="POST" action="/creditor/new">
                {{ csrf_field() }}
                <input name="name" type="text" placeholder="Creditor Name">
                <input name="account" type="text" placeholder="Account #">
                <input name="phone" type="text" placeholder="Creditor Phone">

                <button type="submit">Add Creditor</button>
            </form>

            @if(!$user->creditor)
                <a href="/dashboard">Skip this section</a>
            @else
                <a href="/dashboard" class="btn">Continue</a>
            @endif
        </section>
    @endif

@endsection
