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
                <li>Credit Repair <span>*FICO/Vantage 3.0 Credit Score</span></li>
                <li>Credit Monitoring <span>*FICO/Vantage 3.0 Credit Score</span></li>
                <li>Attorney Representation <span>*Flux Prime Client Benefit</span></li>
                <li>No Hidden Fees</li>
            </ul>       
        </section>

        <section class="product-page_about">
            <h2>“This was the best decision I’ve ever made. I wish I did this sooner!”</h2>
           
            <div class="copy-wrap"> 
                <p>Your credit is constantly in flux. Settling your accounts will satisfy 
your obligation, but creditors don’t always report the updated 
status to the credit bureaus. Over time, your credit rating will 
begin to improve, but you may have several derogatory filings 
on your report that can be removed with appropriate action.</p>
                
                <p>Originally created for our Flux Prime clients, Flux Plus is now 
available as a stand-alone monthly service for those who don’t 
need to eliminate debts, but would like to perfect their FICO /
VANTAGE 3.0 Credit Score.</p>
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
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Credit Repair Service</h3>
            <p>By reviewing & disputing any inaccurate, obsolete, erroneous 
or settled items on your credit score, your score can be 
restored, maximizing financial opportunities.
</p>
        </div>

        <div class="benefit">
            <h3><i class="fa fa-chevron-down" aria-hidden="true"></i> Credit Monitoring Service</h3>
            <p>Due to the recent data breaches, everyday we monitor our 
clients identities for any potential threats to your credit, 
which we can help restore should any issues arise.</p>
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
