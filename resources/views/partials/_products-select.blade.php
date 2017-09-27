<div class="container-fluid products product-select">
  <div class="container np-lr">
    <div id="pricing" class="pricingTable col-xs-10 col-xs-offset-1 col-sm-3 np-lr shadow">
      <div class="pricingTable-header">
        <span id="flux-prime-header" class="heading">
          <h3><img src="/images/fluxprime-logo.svg" alt="Flux Prime"></h3>
          <hr>
          <p>Eliminate and/or consolidate your debts at the lowest market rate</p>
        </span>
      </div>
      <div class="pricingContent">
        <ul>
          <li>1% Cashback</li>
          <li>Prevent Bankruptcy/Litigation</li>
          <li>Secured Future Savings</li>
          <li>Road to Financial Freedom</li>
        </ul>
      </div>
      <div class="pricingTable-sign-up">
        <span class="price-value col-xs-12 np-lr">$9<span class="month">/Monthly*</span></span>

        <p class="col-xs-12 np-lr"><small>*Subject to flux approval</small></p>
        <a href="#" onclick="event.preventDefault(); document.getElementById('prime-form').submit();" class="enroll-btn col-xs-12">SELECT</a>
      </div>
    </div>
    <div class="pricingTable col-xs-10 col-xs-offset-1 col-sm-3 np-lr shadow">
      <img class="best-value-icon" src="/images/best-value-icon.svg">
      <div class="pricingTable-header">
        <span class="heading">
          <h3><img src="/images/fluxplus-logo.svg" alt="Flux Plus"></h3>
          <hr>
          <p>All the valuable benefits of fluxprime, plus:</p>
        </span>
      </div>
      <div class="pricingContent">
        <ul>
          <li>1.5% Cashback</li>
          <li>Tax Defense / Credit Repair</li>
          <li>Credit Repair</li>
          <li>No Transaction Fees</li>
        </ul>
      </div>
      <div class="pricingTable-sign-up">
        <span class="price-value col-xs-12 np-lr">$49<span class="month">/Monthly*</span></span>
        <p><small>*Subject to flux approval</small></p>
        <a href="#" onclick="event.preventDefault(); document.getElementById('plus-form').submit();" class="enroll-btn col-xs-12">SELECT</a>
      </div>
    </div>
  </div>
</div>


<form id="plus-form" role="form" method="POST" action="/plan/plus" style="display: none;">
    {{ csrf_field() }}
</form>

<form id="prime-form" role="form" method="POST" action="/plan/prime" style="display: none;">
    {{ csrf_field() }}
</form>
                