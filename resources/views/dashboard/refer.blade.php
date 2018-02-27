@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')

<div class="col-md-6">
  <div class="panel">
    <div class="panel-body">
      <h3 class="title-hero">
        Invite A Friend
      </h3>
      <div class="example-box-wrapper">
        <p>Refer A Friend & Earn Up To $1,000 In Cash Rewards.</p>
        <form class="form-horizontal bordered-row" role="form" method="POST" action="/dashboard/refer/invite">
          {{ csrf_field() }}
        
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Friend's Name</label>
            <div class="col-md-6">
                <input id="name" placeholder="Friend's Name" type="text" class="form-control" name="name" required autofocus>
                @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Friend's E-Mail</label>
            <div class="col-md-6">
                <input id="email" placeholder="Friend's E-Mail" type="email" class="form-control" name="email" required autofocus>
                @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
            </div>
          </div>

          <div class="form-group text-right">
              <button type="submit" class="btn btn-primary btn-lg">
                  Invite Friend
              </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="panel">
    <div class="panel-body">
      <h3 class="title-hero">
        Your Referral Code
      </h3>
      <div class="example-box-wrapper">
        <h3 class="text-center">If anyone uses this code on sign-up, you both earn cash!</h3>
        <h1 class="text-center">{{ $referral->code }}</h1>
      </div>
    </div>
  </div>
</div>

@endsection


@section('footer')
  <script>


  </script>
@endsection