<div class="container-fluid np-lr newsletter">
  <div class="customer-testimonials col-sm-6">
    <h2 class="section-header text-center"><i class="fa fa-commenting-o"></i>Trusted By Clients</h2>
    <hr>
    <div class="customer-slider">
      <div class="col-xs-12  text-center customer">
        <p class="col-12 col-md-6 col-md-offset-3">"I was truly lost and confused with what was happening. I was embarrassed about my situation but Tonya, my Flux concierge, made it real easy and offered me several solutions to get through this.  #confidencerestored"</p>
        <h3 class="h4">Jasmin J.</h3>
        <small>Alabama</small>
      </div>
      <div class="col-xs-12  text-center customer">
        <p class="col-12 col-md-6 col-md-offset-3">“This was the best decision I’ve ever made. I wish I did this sooner!!” </p>
        <h3 class="h4">Keith M.</h3>
        <small>Tennessee</small>
      </div>
      <div class="col-xs-12  text-center customer">
        <p class="col-12 col-md-6 col-md-offset-3">“After exploring all options, I felt FLUX was my best option to get out of a high debt load due to a recent divorce.”</p>
        <h3 class="h4">Miguel S.</h3>
        <small>California</small>
      </div>
      <div class="col-xs-12  text-center customer">
        <p class="col-12 col-md-6 col-md-offset-3">“It was hard to admit needing help, but unforeseen financial circumstances created more debt than we could handle.”</p>
        <h3 class="h4">Joseph K.</h3>
        <small>California</small>
      </div>
      <div class="col-xs-12  text-center customer">
        <p class="col-12 col-md-6 col-md-offset-3">"Whenever I receive correspondence from creditors or their attorneys, I just forward the letters to FLUX and they handle the matter."</p>
        <h3 class="h4">Jillian A.</h3>
        <small>California</small>
      </div>
    </div>
  </div>
  <!-- NEWSLETTER SECTION -->
  <!-- NEWSLETTER SECTION -->
  <div class="email-signup text-center col-sm-6">
    <h2 class="section-header"><i class="fa fa-envelope-o"></i>Flux Perks</h2>
    <hr>
    <p class="col-12 col-sm-10 col-sm-offset-1 col-md-10 col-lg-6 col-lg-offset-3">For tips to eliminate your debts and perfect your credit, please fill out the form below. <br> <small><em>We promise to not send spam.</em></small></p>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <form class="small" action="/subscribe" method="POST">
      {{ csrf_field() }}
      <input type="email" placeholder="Email">
      <button type="submit">Subscribe</button>
    </form>

  </div>
</div>