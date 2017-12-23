@extends('layouts.client')

@section('content')
    
    <section class="section-header prime">
        <img src="/images/flux_prime.png" />
        <h2>Legally Eliminate Your Debts</h2>
    </section>

    <div class="product-page_bg">
        <section class="product-page_cta">
            <div class="left_wrap">
                <h3>OPEN, UP-FRONT PRICING</h3>
                <h2>$0 MONTHLY PROGRAM FEE</h2>
                <a href="#" class="btn">START TODAY FOR FREE!</a>
            </div>

            <ul>
              <li>Only pay on debts settled <span>*Lowest market rate</span></li>
              <li>Flux Flex Lending <span>*6.9% + interest rate</span></li>
              <li>1% Cash Back towards a Visa Secuired Credit Card</li>
              <li>No hidden fees</li>
            </ul>       
        </section>

        <section class="product-page_about">
            <h2>“I felt Flux was my best option to get out of a high debt load due to a recent divorce.”</h2>
           
            <div class="copy-wrap"> 
                <p>Through our proprietary technology-driven process, we beat the competition and eliminate your debt(s) at the lowest market rate. Clients can expect to save on average 45% of their balance due, which includes our rate! Payments are only made once all parties agree on settlement terms. An agreement is then placed in writing and upon receipt of payment, your creditor account is closed for good!</p>
                
                <p>Every day we help our clients avoid bankruptcy, while getting the fresh start they are legally promised under US law. Your decision to start Flux Prime today could save you tens of thousands of dollars and a lifetime of stress. We look forward to showing you why we are the #1 Bankruptcy Alternative In America.</p>
            </div>

            <img class="iphone" src="/images/large_iphone.png" />
        </section>
    </div>

    <section class="product-page_benefits">
        <h2>PROGRAM BENEFITS</h2>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Quick Sign Up</h3>
            <p>Get signed up in less than 1 minute! Flux Credit can settle most debts, including credit cards, personal loans/lines of credit, medical bills, collections, repossessions, business debts & certain student debts.</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> 24/7 Digital Dashboard</h3>
            <p>Access your account details 24/7 on FluxCredit.com</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Personal Concierge</h3>
            <p>Every step of the way, our team is 
here to understand your circum-
stances & answer any questions you 
have while becoming debt free - 
Unlike the creditors we’re on your 
side!
</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> 6.9% Flux Flex Lending</h3>
            <p>Negotiating settlement terms is sometimes the easy part. 
Over the years, we’ve learned that clients who are going 
through financial hardship often default on the settlement 
and creditors are not obligated to renew their offers. 
Fortunately, Flux Flex is there when you need it, which is 
why we have a higher client success rate than the comp-
etition. If your creditor agrees to settlement terms, but you 
can’t afford the required payments, Flux Flex can finance 
the settlement for you, reducing your monthly payment 
and extending the terms - This could be the difference 
between settling your account or being sued by your credit
or for non-payment. Flux Flex is amortized using a simple 
interest rate as low as 6.9%. Many clients will first attempt 
to seek outside financing from a bank or hard lender before 
joining our program, only to learn their rates are 20-30% 
or higher, due to their current credit circumstances. When 
compared to Flux Flex, taking on one loan to pay off 
another simply doesn’t make sense. Keep more money in 
your pocket, while eliminating your debts & perfecting 
your credit!
</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Visa Secured Credit Card</h3>
            <p>Living without a credit card in this economy is difficult. 
Have you tried renting a car with a debit card? First, it 
will usually require a minimum deposit of $500 and your 
monies may remain on hold for up to a week after you 
return the car. This inconvenience can lead to bounced 
checks and bank fees. Clients who graduate from our 
program are rewarded with a VISA secured credit card, 
backed by an FDIC Insured Savings Account. Did you 
originally get yourself in debt because you were building 
up your credit and then got overextended? It happens, 
but with your secured credit card, it’s impossible. Your 
new secured credit card is yours to keep, even after you 
complete our program. You may wish to deposit more 
funds on the card to increase your credit limit, or you 
may withdrawal funds or close your account if you need 
the cash. As you re-establish your credit, you’ll soon be 
approved for additional loans.
</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> 1% Cash Back</h3>
            <p>Cash out your debts… With Flux 
Prime, our clients earn 1% cashback 
on all settlement payments made. 
These funds are allocated towards a 
secured credit card, opened in your 
name, with monthly reporting to the 
credit agencies. Essentially, you are 
cashing out your old debt, while 
re-establishing your credit! We call 
this; Your Finances… Reinvented! 
</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Zero Risk</h3>
            <p>Our clients always have 100% say 
with their finances. You pay nothing 
until YOU approve your settlement. 
Cancel At Any Time.
</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> No Fees, Ever</h3>
            <p>We’ll never charge you a late fee 
or increase your interest rate and 
there is no prepayment penalty if 
you can complete your settlement 
sooner.
</p>
        </div>
    </section>

    
@endsection

@section('footer')
    <script type="text/javascript">

        $(function() { "use strict";
            $('.benefit').on('click', function() {
                $(this).find('p').slideToggle();
                var icon = $(this).find('i');

                if(icon.hasClass('fa-chevron-down')) {
                    icon.addClass('fa-chevron-up');
                    icon.removeClass('fa-chevron-down');
                } else {
                    icon.addClass('fa-chevron-down');
                    icon.removeClass('fa-chevron-up');
                }
            });
        });

    </script>
@endsection
