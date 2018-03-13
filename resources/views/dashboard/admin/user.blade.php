@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')

  <div class="wrapper page_wrap dash_wrap">
    <div class="panel">
      <div class="panel-body">
        <h3 class="title-hero">
            Editing {{ $user->name }}
        </h3>
        <div class="example-box-wrapper">
          @if($customer->active == false)
            
            ---> activate form

          @endif
        </div>
      </div>
    </div>
  </div>

@endsection