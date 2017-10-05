@extends('layouts.client')

@section('content')

  <section class="home_hero">
    <div class="wrapper">
      <h1>#1 Bankruptcy Alternative in America</h1>

      <h3 class="heading">Eliminate Debts & Perfect Your Credit</h3>

      <p class="tagline">Our team formed FLUX to leverage decades of finance, business & technology experience to help our clients keep over $50 Million in their pockets.</p>

      <ul class="features">
        <li>
          <i class="fa fa-clock-o" aria-hidden="true"></i>
          <h3><a href="#">24hr Service</a></h3>
          <p>Our 24 hour concierge helps reinvent your financial future</p>
        </li>
        <li>
          <i class="fa fa-lock" aria-hidden="true"></i>
          <h3><a href="#">Security</a></h3>
          <p>We never run your credit or require personal banking information</p>
        </li>
        <li>
          <i class="fa fa-thumbs-up" aria-hidden="true"></i>
          <h3><a href="#">Save Money</a></h3>
          <p>We will always offer the lowest market rates</p>
        </li>
        <li>
          <i class="fa fa-usd" aria-hidden="true"></i>
          <h3><a href="#">Flux Credit</a></h3>
          <p>Earn cash back on every settlement!</p>
        </li>
      </ul>

      <a class="btn" href="/register">Start Today</a>
    </div>
  </section>

  @include('partials._products')

  @include('partials._comparison')

  @include('partials._newsletter')

@endsection

@section('footer')
  <link href="{{ asset('js/slick/slick.css') }}" rel="stylesheet">

    <script src="{{ asset('js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.matchHeight-min.js') }}"></script>
    <script>
    $(document).ready(function() {
      $('.pricingTable').matchHeight();
      $('.newsletter .col-sm-6').matchHeight();
      $('.customer-slider').slick({
        autoplay: true,
        autoplaySpeed: 8000,
        arrows: false,
        dots: false,
      });
    });
    </script>
@endsection