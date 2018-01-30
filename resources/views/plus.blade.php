@extends('layouts.client')

@section('content')

    <section class="section-header prime">
        <img src="/images/flux_plus.png" />
        <h2>Perfect Your Credit Score</h2>
    </section>

    <div class="product-page_bg">
        <section class="product-page_cta">
            <div class="left_wrap">
                <h3>OPEN, UP-FRONT PRICING</h3>
                <h2>$49 MONTHLY PROGRAM FEE</h2>
                <a href="#" class="btn">START TODAY FOR FREE!</a>
            </div>

            <ul>
                <li>Credit Repair & Monitoring <span>*FICO/Vantage 3.0 Credit Score</span></li>
          <li>Debt Consolidation</li>
          <li>Attorney Representation</li>
          <li>Tax Defense & Preparation</li>
          <li>1.5% Cash Back <span>*Towards a Visa secured credit card</span></li>
            </ul>       
        </section>

        <section class="product-page_about plus">
            <h2>“This was the best decision I’ve ever made. My life is finally on track!”</h2>
           
            <div class="copy-wrap"> 
                <p>Your credit is constantly in flux. Did you know that you may have negative or erroneous marks reported on your credit that could simply be removed by taking the appropriate actions? However, demanding your creditors resolve the matter with you directly is a tedious & frustrating task. Fortunately, Flux Plus is here to help!

Originally created for our Flux Prime clients, Plus is now available as a stand-alone monthly service for those who don’t need to eliminate debts but would like to perfect their FICO/VANTAGE 3.0 Credit Score.</p> 

<p>Additionally, Flux Prime clients can utilize Plus as an added extension of their debt elimination program & receive our credit repair & monitoring service, consolidation, additional 1.5% cash back, attorney representation on enrolled debts, a tax specialist that will prepare, sign off & maximize your tax returns & no transaction fees.
</p>
            </div>

            <img class="iphone" src="/images/plus_hero.png" />
        </section>
    </div>    

    <section class="product-page_benefits">
        <h2>PROGRAM BENEFITS</h2>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Quick Sign Up</h3>
            <p>Get signed up in less than a minute! You’ll have 24/7 access to your digital dashboard.</p>
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
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Credit Repair & Monitoring Service</h3>
            <p>Due to recent data breaches, we monitor our clients identities for potential threats that could adversely impact their credit. This is done without making any credit inquiry. By reviewing and disputing any inaccurate, obsolete or erroneous marks, your credit score will rebound to maximize your financial opportunities.
</p>
        </div>

        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Consolidation</h3>
            <p>Clients have the option to enroll their fixed monthly expenses, such as but not limited to rent/mortgage, car payments and insurance. This offers one convenient monthly payment to help budget and ensure that you are never late on a payment again. In some cases we may be able to reduce your interest rate and monthly payment.</p>
        </div>

        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Tax Defense</h3>
            <p>Clients enrolled in Flux Plus may submit their tax forms to 
our CPA’s, who will prepare and sign off their tax return. 
There are many online sites that offer free tax service, 
however, if the IRS notices any red flags, you may be 
audited and on the hook.  With Flux Plus, not only do we 
offer you full protection, but we maximize your return with 
our tax professionals. Some clients, especially business 
owners, may run into more complicated tax issues. With 
our Tax Defense strategy, we help our clients avoid 
penalties, interest, liens and levies. 
</p>
        </div>

    </section>

    <section class="product-page_benefits">
        <h2>ADDITIONAL BENEFITS FOR PRIME CLIENTS</h2>

        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Consolidation</h3>
            <p>COMING SOON</p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> 1.5% Cash Back</h3>
            <p>Cash out your debts… With Flux Plus, 
our clients earn 1.5% cash back on all 
settlement payments made. These funds 
are allocated to a secured credit card, 
opened in your name, with monthly 
reporting to the credit agencies. 
Essentially, you are cashing out your 
old debt, while re-establishing your 
credit! We call this; Your Finances… 
Reinvented! </p>
        </div>
        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Attorney Representation</h3>
            <p>In some cases your creditor may file 
litigation to secure a judgment against 
you. However, clients enrolled in Flux 
Plus will have legal representation, 
that will file an answer in the local 
jurisdiction. Flux Plus clients will not 
be responsible for any additional 
attorney fees and our network of 
attorneys will take on the case to 
negotiate on behalf of our clients.</p>
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
