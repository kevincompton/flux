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
              <li>1% Cash Back towards a Visa Secured Credit Card</li>
              <li>No hidden fees</li>
            </ul>       
        </section>

        <section class="product-page_about">
            <h2>“Flux Credit reduced my monthly payments and got me out of debt in just 18 months. Best part, I now have a new Visa and a Savings account of $1,200!”</h2>
           
            <div class="copy-wrap">
                <p>Flux Prime was designed by our team of industry veterans as the best solution in America to become debt free. Our all-inclusive program eliminates your debts and perfects your credit.  Clients will earn cash back, which is allotted towards a VISA secured credit card opened in their name and backed by an FDIC Insured Savings Account. Clients should expect their credit issues to be fully resolved five to ten years sooner and two to three times less expensive by using Flux versus making their minimal payment only to their creditors.
Through our proprietary technology-driven process, we beat the competition and eliminate your debt(s) at the lowest market rate. We offer a free analysis of your credit circumstance and design a program that is right for you.  We will never run your credit or share your personal information with any third party, ever!  Payments are only accepted once our clients agree to a written proposal. Every day we help our clients avoid bankruptcy, while getting the fresh start they are legally promised under US law. Your decision to start Flux Prime today could save you tens of thousands of dollars and a lifetime of stress. We look forward to showing you why we are the #1 Bankruptcy Alternative in America!</p>
            </div>

            <img class="iphone" src="/images/large_iphone.png" />
        </section>
    </div>

    <section class="product-page_benefits">
        <h2>PROGRAM BENEFITS</h2>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Quick Sign Up</h3>
            <p>Sign up in less than a minute!  Flux Credit can settle most debts, including credit cards, personal loans/lines of credit, medical bills, collections, repossessions, business debts & certain student debts.</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> 24/7 Digital Dashboard</h3>
            <p>Access your account details 24/7 on FluxCredit.com</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Personal Concierge</h3>
            <p>Our team is here to help you every step of the way. You may communicate with your Personal Concierge 24/7, by phone, chat, text, email and web. We’re here to keep more money in your wallet and less money paid towards interest, so you can enjoy the flux lifestyle. You’ll have a financial advisor on call to point you & your family in the right direction during future financial decisions.</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Flux Flex Lending - 6.9% APR</h3>
            <p>Over the years, we’ve learned that clients who are going through financial hardship sometimes default on the settlement terms reached with their creditors. Clients are at a loss because the creditors are not obligated to renew their offers. Fortunately, Flux Flex is there when you need it! For this reason, Flux Credit has a higher success rate than the competition. With Flex, our clients can reduce their monthly payment and we will finance the difference at 6.9% APR, to ensure that your agreement does not go null and void. The alternative to Flux is to seek a loan from a hard money lender at a rate of 20%-30%, or even higher. Not only are these rates outrageous, there is no forgiveness and they run your credit, with no guarantee of approval. Compared with Flux Credit, once you are our client, you are automatically approved for Flex, and we never run your credit! Taking on one loan to pay off another simply doesn’t make sense. Keep more money in your pocket while eliminating your debts & perfecting your credit, with Flux Credit.
</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Visa Secured Credit Card</h3>
            <p>Living without a credit card in this economy is difficult.  For example, have you tried renting a car with only a debit card? Unfortunately, you may not be approved for the rental, but if you are, they will likely place a minimum hold of at least $500 on your account and this may not be released for up to two weeks after you return the car. If your cashflow is tight, this could lead to bounced checks and bank fees.  Fortunately, most Flux Credit clients will be approved for the VISA card, regardless of their credit score and even if they have previously filed bankruptcy. The VISA card is backed by an FDIC Insured Savings account opened in your name.  Best of all, this will report positively on your revolving credit, regardless if you use the card or not. By boosting your credit score and satisfying your old debt, your credit score will improve over time. This is just another example as to why Flux Credit is quickly becoming the industry leader
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
