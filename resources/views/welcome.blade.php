@extends('layouts.client')

@section('content')

  <section class="home_hero">
    <div class="wrapper">
      <img class="flux-card" src="/images/flux-card.png" />
      <h1>ELIMINATE DEBTS.<br>
        PERFECT YOUR CREDIT.<br>
        CASH BACK.
      </h1>

      <a class="btn" href="/register">Sign Up For Free</a>
      
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